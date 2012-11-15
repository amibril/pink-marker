<?php

include "C:/servidor/apache2/htdocs/pink-marker/system/config.Testing.php";
include "C:/servidor/apache2/htdocs/pink-marker/system/Class/BaseDatos.php";
include "C:/servidor/apache2/htdocs/pink-marker/system/Model/Buscador.php";

class BuscadorTest extends PHPUnit_Framework_TestCase {
    
    private   $buscador;
    private   $conexionTemporal;
    
    protected function setUp() {
        
        $this->conexionTemporal = new BaseDatos();
        
    }

    protected function tearDown() {
        
        unset($this->buscador);
        unset($this->conexionTemporal);
        
        
        $sql = "TRUNCATE TABLE enlace RESTART IDENTITY";
        
        $limpiarDb = new BaseDatos();
        $limpiarDb->conectar();
        $limpiarDb->ejecutarConsulta($sql);
        $limpiarDb->terminarConexion();

    }

    public function testBusquedaSimple() {
        
        $this->conexionTemporal->conectar();
        
        $sqlRegistroUno  = "INSERT INTO enlace VALUES(DEFAULT,'Nombre uno','direccion','descripcion')";
        $this->conexionTemporal->ejecutarConsulta($sqlRegistroUno);
		
	$sqlRegistroDos  = "INSERT INTO enlace VALUES(DEFAULT,'Nombre dos','direccion','descripcion')";
	$this->conexionTemporal->ejecutarConsulta($sqlRegistroDos);
        
        $this->conexionTemporal->terminarConexion();
        
        $buscadorSimple = new Buscador("Nombre");
        
        $listaValoresEncontrados = $buscadorSimple->busquedaSimple();
        
        var_dump($listaValoresEncontrados);
        
        $listaValoresEsperados   = array(
            0 => array( 'id_enlace'=> '1',
                        'nombre_e' => 'Nombre uno',
                        'direccion_e'=>'direccion',
                        'descripcion_e'=>'descripcion'
            ),
            1 => array('id_enlace' => '2',
                       'nombre_e'=>'Nombre dos',
                       'direccion_e'=>'direccion',
                       'descripcion_e'=>'descripcion'
            )
        );
        
        $this->assertEquals($listaValoresEsperados, $listaValoresEncontrados);
        
        
    }

    public function testBusquedaPorTipo() {

    }

}
