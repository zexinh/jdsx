<?php
   class addressModel extends Model{
       protected $table_name='Address';
       function __construct(){
           global $C;
           parent::__construct($C,true);
       }
   }
?>