<?php
 class Model{
     private $pdo=null;
     private $debug=false;
     protected $table_name='';
     function __construct($C,$debug){
        $dbdriver=$C['dbdriver'].":dbhost=".$C['dbhost'].";dbname=".$C['dbname'].";charset=".$C['charset'];
        $this->pdo=new PDO($dbdriver,$C['dbuser'],$C['dbpwd']);
        $this->debug=$debug;
        if($this->debug){
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         }
     }
     public function insert($incontent){
        $table_name =  $this->table_name;
         $keys=join(',',array_keys($incontent));
         $values="'".join("','", array_values($incontent))."'";
        //    $this->pdo->exec("insert into goods(id,g_name,g_price,g_thumb,add_time) values(1,'测试1',18,'测试用',11)"); 
        //    $this->pdo->exec("insert into goods (g_name) values('榴莲')"); 
         $sql="insert into $table_name($keys) values($values)";
         try{
         $this->pdo->exec($sql);
        }catch(PDOException $e){
             echo '插入语句出错';
        }
     }
     
     public function delete($dele){         //只能通过ID删除
        $table_name =  $this->table_name;
        $sql="delete from $table_name where id=$dele";
        try{
            $this->pdo->exec($sql);
           }catch(PDOException $e){
                echo '删除语句出错';
           }
     }
     public function update($updatecontent,$where){
        $table_name =  $this->table_name;
        $sets='';
          foreach ($updatecontent as $key=>$val){
              $sets=$sets.$key."='".$val."',";
            }
            $sets=rtrim($sets,','); //去掉SQL里的最后一个逗号
            $where=$where==null?'':' WHERE '.$where;
            $sql="UPDATE {$table_name} SET {$sets} {$where}";
            try{
                $this->pdo->exec($sql);
               }catch(PDOException $e){
                    echo '修改语句出错';
               }
     }
     public function select(){
          $Statement=$this->pdo->prepare("select * from ".$this->table_name." order by id DESC");//Statement结果集
          $Statement->execute();
          return $Statement->fetchAll(PDO::FETCH_ASSOC);
     }
     public function find($where_str){
        $Statement = $this->pdo->prepare("select * from ".$this->table_name." where ".$where_str);
		$Statement->execute();
		return  $Statement->fetch(PDO::FETCH_ASSOC);
     }
     public function setValues($data_content){
             if(is_array($data_content)&&!empty($data_content)){
                 foreach($data_content as $key => $value){
                        if(is_string($value)){
                            $data_content[$key]="'".$value."'";
                        }
                 }
             }else{
                 echo '不是数组';
             }
      
             return implode(",", $data_content);
          
             
     }
 }