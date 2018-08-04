<?php

class GoodsModel extends Model{
    protected $table_name="goods";
  function __construct(){
      global $C;
      parent::__construct($C,true);
  }
   function insert($icontent){
       parent::insert($icontent);
   }
   function update($icontent,$test){
    parent::update($icontent,$test);
   }
   function dele($del){
     parent::delete($del);
   }
//    function select(){
//        return parent::select();
//    }
}

?>