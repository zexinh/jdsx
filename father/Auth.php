<?php
 class Auth extends Control{
     function __construct(){
         parent::__construct();                   //子类调用父类控制器
         if(empty($_SESSION['uname'])){
          echo '你不是会员';

        }
     }
 }
?>