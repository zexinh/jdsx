<?php
   class UsersModel extends Model{
       protected $table_name='Users';
       function __construct(){
           global $C;
           parent::__construct($C,true);
       }
   }
?>