<?php
class BaseDatos
{
    private $enlace;

    public function BaseDatos(){
        $this->enlace = null;
    }

    public function conectar(){
        try{
            $this->enlace = new PDO("pgsql:dbname=".DB_NAME.";host=".DB_HOST,
                                    DB_USER,DB_PASS);
        }catch(PDOException $e){
            echo $e->getMessage();
            exit();
        }
    }
    
    public function terminarConexion(){
        $this->enlace = null;
    }
    
    public function conexionEstablecida(){
        return $this->enlace != null;
    }

    // devuelve una tupla en forma de arreglo
    public function consultaSimple($sql){
        return $this->enlace->query($sql,PDO::FETCH_ASSOC)->fetch();
    }

    // devuelve un conjunto de tuplas
    public function consultaMultiple($sql){
        return $this->enlace->query($sql,PDO::FETCH_ASSOC)->fetchAll();
    }

    public function ejecutarConsulta($sql){
        $this->enlace->exec($sql);
    }
    
	public function identificadorRegistro($tabla, $llave){
		$sql="";
		//$consulta = $this->consultaSimple($sql);
		//return $consulta;
		return 1;
	}
}