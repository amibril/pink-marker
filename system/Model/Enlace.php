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
    
}

