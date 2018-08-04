<?php
//控制器
 class Goods extends Control{
     private $updateid;
     private $updatedata=array();
     public function index(){
        $this->display();
     }
     public function add(){
        $this->display();

     }
     public function save(){

         $imgpath='';
         if(isset($_FILES['img']['tmp_name'])){
              $imgpath="public/images/".time().".jpg";
                copy($_FILES['img']['tmp_name'],$imgpath);
         }
        $this->model('Goods')->insert([
            'g_name'=>$_POST['g_name'],
            'g_price'=>$_POST['g_price'],
            'add_time'=>time(),
            'g_thumb'=>$imgpath,
            'g_introduce'=>$_POST['g_introdunce']
        ]);
     } 
     public function dele(){
         $deleid=$_GET['id'];
         if(!empty($deleid)){
         $this->model('Goods')->dele($deleid);
        }else{
            echo '删除内容为空';
        }
     }
     public function update(){
         $_SESSION['id']='id='.$_GET['id'];
         
        $this->display();
        //  $this->display();
        //  echo json_encode($res);      
     }
     public function getUpdatedata(){

        $imgpath='';
        if(isset($_FILES['img']['tmp_name'])){
             $imgpath="public/uploads/".time().".jpg";
               copy($_FILES['img']['tmp_name'],$imgpath);
        }
           $this->model('Goods')->update([
            'g_name'=>$_POST['g_name'],
            'g_price'=>$_POST['g_price'],
            'add_time'=>time(),
            'g_thumb'=>$imgpath,
            'g_introduce'=>$_POST['g_introdunce']
           ],$_SESSION['id']);
     }
     public function getGoodsList(){

        echo json_encode($this->model('Goods')->select());
     }
}
?>