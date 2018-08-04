<?php
   class User extends Control{
       public function login(){
           $this->display();
       }
       public function register(){
             $this->display();
       }
       public function doReg(){
              $_SESSION['uname']=$_POST['uname'];
              $_SESSION['upwd']=$_POST['upwd'];
              $this->model('Users')->insert([
                  'username'=>$_SESSION['uname'],
                  'password'=>$_SESSION['upwd']
              ]);
       }
       public function logOut(){
           unset($_SESSION['uname']);
           echo '已经退出';
       }
       public function getData(){
        echo $this->model('Users')->select();
      }
   }

?>