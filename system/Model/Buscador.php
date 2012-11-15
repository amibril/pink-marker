<?php

class Buscador {
    
    const ENLACE_NOMBRE = 0;
    const ENLACE_DIRECCION = 1;
    const ENLACE_DESCRIPCION = 2;
    
    private $expresionBuscada;
        
    public function __construct($busquedaPorNombre = null) {
        $this->expresionBuscada=$busquedaPorNombre;
    }
    
    public function busquedaSimple(){
      
      if(is_null($this->expresionBuscada)){
          return false;
      }  
        
      $database = new BaseDatos();
      $database->conectar();
      $sqlBusqueda = "SELECT * FROM enlace WHERE nombre_e LIKE '%{$this->expresionBuscada}%'";
      
      $listaValores = $database->consultaMultiple($sqlBusqueda);
         
      return ($listaValores) ? $listaValores : false;
      
    } 
   
    public function busquedaPorTipo($expresionBuscada = NULL,$tipoBuscado = 0)
    {
      $database = new BaseDatos();
      $condicionBuscada = "";              
      switch ($tipoBuscado) {
          case 0:
              $condicionBusqueda = "nombre_e LIKE '%{$expresionBuscada}%'";
              break;
          case 1:
              $condicionBusqueda = "direccion_e LIKE '%{$expresionBuscada}%'";
              break;
          case 2:
              $condicionBusqueda = "descripcion_e LIKE '%{$expresionBuscada}%'";
              break;
          default:
            return false;
      }
            
      $sqlConsulta = "SELECT * FROM enlace WHERE ".$condicionBuscada;
      $listaValores = $database->consultaMultiple($sqlConsulta);
         
      return ($listaValores)? $listaValores : false ;
      
   }
}
?>
