<?php

include_once ("../Model/enlace.php");

class Searcher {
    
    private $name,$direction,$description,$id;
    
    function __construct($name) {
        $this->name=$name;
        $this->direction = Enlace::getDirection();
        $this->description = Enlace::getDescription();
        $this->id = Enlace::getId();
    }
    
    function search(){
        
      $database=new DataBase(Server,Port,DataBase,User,Pass);
      $consult="SELECT * FROM enlace WHERE nombre_e='$this->name'";
      $res=$database->Consult($consult);
      
      $data=@pg_fetch_all($res);
         
      if($data[0]['nombre_e'])
         return $data;
      else
         return 0;      
   }    
    function searchLink()
   {
      $database = new DataBase(Server,Port,DataBase,User,Pass);
                    
      if($this->name!="")
      {
         $condition=$condition."nombre_e LIKE"."'%$this->name%'";
         $operator="AND";
      }
      
      if($this->direction!="")
      {
         $condition=$condition." ".$operator." direccion_e LIKE"."'$this->direction%'";
         $operator="AND";
      }
      
      if($this->description!="")
      {
         $condition=$condition." ".$operator." descripcion_e LIKE"."'$this->description%'";
         $operator="AND";
      }      
      if($this->id!="")
      {
         $condition=$condition." ".$operator." id_enlace="."'$this->id'";
         $operator="AND";
      }
      
      $consult="SELECT * FROM enlace WHERE ".$condition." AND id_enlace='$this->id')";
      $res = $database->Consult($consult);
      $data=@pg_fetch_all($res);
         
      if($data[0]['id'])
         return $data;
      else
         return 0;      
   }
}
?>
