<?php

   
  class Control{
      private static $control;
      private static $method;
      private $test;
      private $smarty;
      function __construct(){
          $this->smarty=new Smarty();

          $this->smarty->template_dir = 'view';
          $this->smarty->left_delimiter='<{';
          $this->smarty->right_delimiter='}>';
      }
      public function Run(){
        self::$control = $control =  isset($_REQUEST['control'])?$_REQUEST['control']:'Goods';
        self::$method = $method =isset($_REQUEST['action'])?$_REQUEST['action']:'index';
          include_once "control/$control.php";
          $control_obj=new $control();
          $control_obj->$method();
      }
      public function display($html=''){
        // 做什么样的人
		   if ($html) {
		    	$this->smarty->display($html);
		    }else{
		    	$this->smarty->display(self::$control."/".self::$method.".html");
		    }
		
        // $this->smarty->display(self::$control."/".self::$method.".html");
        //   include_once "view/".self::$control."/".self::$method.".html";
      }
      public function assign($name,$value){   
        
        $this->smarty->assign($name,$value);
      }
      public function model($access_name)
      {
          $model_name  =  $access_name."Model";
          include "model/$model_name.php";
          return new $model_name();
  
      }
    
  }


?>
