<?php
include "C:/servidor/apache2/htdocs/pink-marker/system/config.Testing.php";
include "C:/servidor/apache2/htdocs/pink-marker/system/Class/BaseDatos.php";
include "C:/servidor/apache2/htdocs/pink-marker/system/Model/Enlace.php";

class EnlaceTest extends PHPUnit_Framework_TestCase
{
    private $object;
	private $enlacePrueba;

    protected function setUp()
    {
        $this->enlacePrueba = new Enlace();
    }

    protected function tearDown() {

		unset($this->enlacePrueba);
        
		$sql = "TRUNCATE TABLE ENLACE RESTART IDENTITY";
        
		$this->object = new BaseDatos();
		$this->object->conectar();
        $this->object->ejecutarConsulta($sql);
        $this->object->terminarConexion();
        
    }

    public function testAgregarEnlaceARegistro()
    {
       $enlaceAgregado = $this->enlacePrueba->agregarEnlace("Nombre enlace","Direccion","Descripcion");
	   $this->assertTrue($enlaceAgregado);
    }
	
	public function testExisteNombreDeEnlace(){
		$this->enlacePrueba->agregarEnlace("Nombre enlace existe","Direccion","Descripcion");
		
		$this->assertFalse($this->enlacePrueba->existeEnlace("Nombre enlace no existente"));
		$this->assertTrue($this->enlacePrueba->existeEnlace("Nombre enlace existe"));		
	}
	
	public function testBorrarEnlace(){
		$this->enlacePrueba->agregarEnlace("Nombre enlace existe","Direccion","Descripcion");
		
		$numeroIdentificadorEnlace = $this->enlacePrueba->identificadorEnlace();
		$this->assertNotNull($numeroIdentificadorEnlace);
		
		$enlaceBorrado = $this->enlacePrueba->borrarEnlace($numeroIdentificadorEnlace);		
		$this->assertTrue($enlaceBorrado);		
	}
	
	public function testActualizarEnlacePorNombre(){
		$this->enlacePrueba->agregarEnlace("Nombre enlace actualizar","Direccion","Descripcion");
		
		$numeroIdentificadorEnlace = $this->enlacePrueba->identificadorEnlace();
		$this->assertNotNull($numeroIdentificadorEnlace);
		
		$enlaceActualizado = $this->enlacePrueba->actualizarNombre("Nombre enlace actualizado");		
		$this->assertTrue($enlaceActualizado);		
	}
	public function testActualizarEnlacePorDescripcion(){
		$this->enlacePrueba->agregarEnlace("Nombre enlace","Direccion","Descripcion  actualizar");
		
		$numeroIdentificadorEnlace = $this->enlacePrueba->identificadorEnlace();
		$this->assertNotNull($numeroIdentificadorEnlace);
		
		$enlaceActualizado = $this->enlacePrueba->actualizarDescripcion("Descripcion actualizado");		
		$this->assertTrue($enlaceActualizado);		
	}

	public function testActualizarEnlacePorDireccion(){
		$this->enlacePrueba->agregarEnlace("Nombre enlace","Direccion a actualizar","Descripcion");
		
		$numeroIdentificadorEnlace = $this->enlacePrueba->identificadorEnlace();
		$this->assertNotNull($numeroIdentificadorEnlace);
		
		$enlaceActualizado = $this->enlacePrueba->actualizarDireccion("Direccion actualizada");		
		$this->assertTrue($enlaceActualizado);		
	}
	
	public function testValidarDireccionCorrecta(){
		$enlaceValido = $this->enlacePrueba->validarDireccion("http://localhost");	
		$this->assertTrue($enlaceValido);
		
		$enlaceValido = $this->enlacePrueba->validarDireccion("http://localhost.com");		
		$this->assertTrue($enlaceValido);
		
		$enlaceValido = $this->enlacePrueba->validarDireccion("http://www.localhost.com");		
		$this->assertTrue($enlaceValido);
		
		$enlaceValido = $this->enlacePrueba->validarDireccion("http://www.prueba.com:80");		
		$this->assertTrue($enlaceValido);
		
		$enlaceValido = $this->enlacePrueba->validarDireccion("http://www.prueba.com/index.html");
		$this->assertTrue($enlaceValido);
		
		$enlaceValido = $this->enlacePrueba->validarDireccion("http://www.prueba.com/index.php?val=uno");
		$this->assertTrue($enlaceValido);
		
	}

	public function testValidarDireccionIncorrecta(){
		
		$enlaceIncorrecto = $this->enlacePrueba->validarDireccion("http://");		
		$this->assertFalse($enlaceIncorrecto);
		
		$enlaceIncorrecto = $this->enlacePrueba->validarDireccion("nombredominio");		
		$this->assertFalse($enlaceIncorrecto);

		$enlaceIncorrecto = $this->enlacePrueba->validarDireccion("nombredominio.com");		
		$this->assertFalse($enlaceIncorrecto);
	}	
}
