<?php

class Enlace{
    
    private $id_enlace;
    private $nombre;
    private $direccion;
    private $descripcion;
    
    private $db;
    
    public function __construct(){
        $this->db = new BaseDatos();
        $this->db->conectar();
    }
	
    public function agregarEnlace($nombre,$direccion,$descripcion) {
        
        $this->nombre = $nombre;
        $this->direccion = $direccion;
        $this->descripcion = $descripcion;
        

        $sql = "INSERT INTO ENLACE VALUES(DEFAULT, {$this->nombre}, {$this->direccion}, {$this->descripcion})";
	$this->db->ejecutarConsulta($sql);
        
        $this->id_enlace = $this->db->identificadorRegistro("enlace","id_enlace");
        
        return $this->id_enlace;
    }
    
//    public function borrarEnlace($identificadorEnlace){
//            
//        $res = pg_query($link,"DELETE FROM enlace where nombre_e='$this->nombre_e'");
//        
//        if (pg_affected_rows($res)>=0) {
//            return 1;
//        }
//        else{
//            return 0;
//        }
//		
//		return false;
//   }
//    public function existeEnlace($nombreEnlace){        
//
//        $sql="SELECT *FROM enlace WHERE nombre_e='{$nombreEnlace}'";      
//        $res = $this->db->consultaSimple($sql);
//		
//        if(empty($res)){
//            return false;
//        }else{
//            return true;
//	}
//		
//		return false;
//    }
//
//    public function darNombre() {
//        return $this->nombre;
//    }
//
//    public function darDireccion() {
//        return $this->direccion;
//    }
//
//    public function darDescripcion() {
//        return $this->descripcion;
//    }
//
//    public function identificadorEnlace() {
//        return $this->id_enlace;
//    }
//
//    public function actualizarNombre($nombre) {
//        return false;
//    }
//
//    public function actualizarDireccion($direccion) {
//        return false;
//    }
//
//    public function actualizarDescripcion() {
//        return false;
//    }
//
//    public function validarDireccion($direccion){
//    	return false;
//    }
}

