<<<<<<< HEAD
<?php
include "C:/servidor/apache2/htdocs/pink-marker/system/config.Testing.php";
include "C:/servidor/apache2/htdocs/pink-marker/system/Class/BaseDatos.php";

class BaseDatosTest extends PHPUnit_Framework_TestCase {


    public $object;

    protected function setUp() {
        $this->object = new BaseDatos();
    }

    protected function tearDown() {

        $sql = "TRUNCATE TABLE pruebatabla RESTART IDENTITY";
        
        $this->object->ejecutarConsulta($sql);
        $this->object->terminarConexion();
        
    }
    
    public function testConectarABaseDeDatos() {
        $conexionFallida = $this->object->conexionEstablecida();
        $this->assertFalse($conexionFallida);
        
        $this->object->conectar();
        
        $conexionEstablecida = $this->object->conexionEstablecida();
        $this->assertTrue($conexionEstablecida);
    }
    
    public function testConsultaSimple() {
	
		$this->object->conectar();
		
		$sqlRegistroUno  = "INSERT INTO PRUEBATABLA VALUES(DEFAULT,'Nombre Uno','1')";
		$this->object->ejecutarConsulta($sqlRegistroUno);
		
		$sqlRegistroDos  = "INSERT INTO PRUEBATABLA VALUES(DEFAULT,'Nombre Dos','2')";
		$this->object->ejecutarConsulta($sqlRegistroDos);
		
		$arregloEsperado = array(
							  'id' => 1,
							  'nombre' => "Nombre Uno",
							  'numero' => 1
							);
		
		$sqlSeleccionSimple = "SELECT * FROM PRUEBATABLA";
		$arregloCalculado = $this->object->consultaSimple($sqlSeleccionSimple);
		$this->assertEquals($arregloEsperado,$arregloCalculado);
        
    }

     public function testConsultaMultiple() {
	
		$this->object->conectar();
		
		$sqlRegistroUno  = "INSERT INTO PRUEBATABLA VALUES(DEFAULT,'Nombre Uno','1')";
		$this->object->ejecutarConsulta($sqlRegistroUno);
		
		$sqlRegistroDos  = "INSERT INTO PRUEBATABLA VALUES(DEFAULT,'Nombre Dos','2')";
		$this->object->ejecutarConsulta($sqlRegistroDos);
		
		$sqlRegistroTres = "INSERT INTO PRUEBATABLA VALUES(DEFAULT,'Nombre Tres','3')";
		$this->object->ejecutarConsulta($sqlRegistroTres);
		
		$arregloEsperado = array( 0 => array(
                                                    'id' => 1,
                                                    'nombre' => "Nombre Uno",
						    'numero' => 1
                                               ),
                                          1 => array(
                                                    'id' => 2,
                                                    'nombre' => "Nombre Dos",
						    'numero' => 2
                                          ),
                                          2 => array(
                                                    'id' => 3,
                                                    'nombre' => "Nombre Tres",
						    'numero' => 3
                                          )							  
					);
		
		$sqlSeleccionSimple = "SELECT * FROM PRUEBATABLA";
		$arregloCalculado = $this->object->consultaMultiple($sqlSeleccionSimple);
		$this->assertEquals($arregloEsperado,$arregloCalculado);
        
    }
   
    
    public function testRegistrarDosElementosEnTablaYRecuperandoIdentificador(){
        $this->object->conectar();
        
        $sqlRegistroUno  = "INSERT INTO PRUEBATABLA VALUES(DEFAULT,'Nombre Uno','1')";
        $this->object->ejecutarConsulta($sqlRegistroUno);
        
        $identificadorUnoCalculado = $this->object->identificadorRegistro("pruebatabla","id");
        
	$identificadorUnoEsperado = array('identificador'=> 1);
        $this->assertEquals($identificadorUnoEsperado,$identificadorUnoCalculado);
        
	$sqlRegistroDos  = "INSERT INTO PRUEBATABLA VALUES(DEFAULT,'Nombre Dos','2')";
        $this->object->ejecutarConsulta($sqlRegistroDos);
        
        $identificadorDosEsperado = $this->object->identificadorRegistro("pruebatabla","id");
        $identificadorDosCalculado = array('identificador'=> 2);
        $this->assertEquals($identificadorDosEsperado,$identificadorDosCalculado);
        
    }
}
=======
<?php
include "C:/servidor/apache2/htdocs/pink-marker/system/config.Testing.php";
include "C:/servidor/apache2/htdocs/pink-marker/system/Class/BaseDatos.php";

class BaseDatosTest extends PHPUnit_Framework_TestCase {


    public $object;

    protected function setUp() {
        $this->object = new BaseDatos();
    }

    protected function tearDown() {

        $sql = "TRUNCATE TABLE pruebatabla RESTART IDENTITY";
        
        $this->object->ejecutarConsulta($sql);
        $this->object->terminarConexion();
        
    }
    
    public function testConectarABaseDeDatos() {
        $conexionFallida = $this->object->conexionEstablecida();
        $this->assertFalse($conexionFallida);
        
        $this->object->conectar();
        
        $conexionEstablecida = $this->object->conexionEstablecida();
        $this->assertTrue($conexionEstablecida);
    }

    public function testRegistrarTresElementos() {
        $this->object->conectar();
        
        $sql = "INSERT INTO PRUEBATABLA VALUES(DEFAULT,'Nombre uno','123456')";
        $this->object->ejecutarConsulta($sql);
		$idenficadorEsperado  = 1;
		$identificadorCalculado = $this->object->identificadorRegistro("pruebatabla","id"); 
		$this->assertEquals($idenficadorEsperado,$identificadorCalculado);
    }    
    
    public function testConsultaSimple() {
	
		$this->object->conectar();
		
		$sqlRegistroUno  = "INSERT INTO PRUEBATABLA VALUES(DEFAULT,'Nombre Uno','1')";
		$this->object->ejecutarConsulta($sqlRegistroUno);
		
		$sqlRegistroDos  = "INSERT INTO PRUEBATABLA VALUES(DEFAULT,'Nombre Dos','2')";
		$this->object->ejecutarConsulta($sqlRegistroDos);
		
		$sqlRegistroTres = "INSERT INTO PRUEBATABLA VALUES(DEFAULT,'Nombre Tres','3')";
		$this->object->ejecutarConsulta($sqlRegistroTres);
		
		$arregloEsperado = array(
							  'id' => 1,
							  'nombre' => "Nombre Uno",
							  'numero' => 1
							);
		
		$sqlSeleccionSimple = "SELECT * FROM PRUEBATABLA";
		$arregloCalculado = $this->object->consultaSimple($sqlSeleccionSimple);
		$this->assertEquals($arregloEsperado,$arregloCalculado);
        
    }
}
>>>>>>> 7ff2c11959b028c871a2900f0925e18f738711f9
