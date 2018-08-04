<?php
   session_start();
  $C =include_once 'config.php';                 //配置文件
  include_once 'father/Model.php';               //模型底层（有关数据库）
  include_once 'father/smarty/Smarty.class.php';  //模板引擎
  include_once 'father/Control.php';             //控制器底层
  include_once 'father/Auth.php';                //权限管理
  
// echo $_GET['control'];
  $a=new Control();
  // $a->Runkid();
  // $a->Test();
  
  $a->Run();

?>
