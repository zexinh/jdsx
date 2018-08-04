<?php
//控制器
 class Jdsx extends Control{
     public function index(){
      include_once 'view/jdsx/index.html';
     }
    //  public function add(){
    //     $this->display();
    //  }
     public function getGoods(){
          //调用GoodsModel
        // $this->model('Goods')->insert('goods',['g_name'=>$_GET['g_name']]);
        echo json_encode($this->model('Goods')->select());
     } 
     public function info(){
      $id = $_GET['id'];
      $info = $this->model('goods')->find("id=$id");
      $this->assign('info',$info);
  
      $this->display();

     }
}
?>