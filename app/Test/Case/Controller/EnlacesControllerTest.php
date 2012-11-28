<?php
class EnlacesControllerTest extends ControllerTestCase{
	public $fixtures = array('app.enlace', 'app.directorio');
	
	public function setup(){
		parent::setUp();
		$this->Enlace = ClassRegistry::init('Enlace');
	}

	public function testAdd() {
		$data = array(
			'Enlace' => 	array(
				'directorio_id'=>1, 
				'nombre'=>'Twitter', 
				'Direccion'=>'www.twitter.com', 
				'descripcion' => 'Red Social de mensajes Twitter.'
		));

		$before = $this->Enlace->find('count');
		
		$this->testAction('/enlaces/add', array('data' => $data, 'method' => 'post'));	
		
		$after = $this->Enlace->find('count');
		$this->assertEquals($after, $before+1);
		
		$result = $this->Enlace->find('count', array('conditions' => array('Enlace.nombre' => $data['Enlace']['nombre'])));
		$this->assertNotEmpty($result, 'El registro no aparece en la BD.');
		
	}
	
	function testDelete(){		
		$before = $this->Enlace->find('count');
		
		$this->testAction('/enlaces/delete/1', array('method' => 'get'));
		
		$after = $this->Enlace->find('count');
		$this->assertEquals($before-1, $after);
	}
	
	
	public function testEdit(){
		$id = 1;
		$this->Enlace->id = $id;
		$before = $this->Enlace->read();
				
		$data = array(
			'Enlace' => 	array(
				'id' => $id,
				'directorio_id'=>1, 
				'nombre'=>'Twitter', 
				'Direccion'=>'www.twitter.com', 
				'descripcion' => 'Red Social de mensajes Twitter.'
		));
		
		$this->testAction('/enlaces/edit', array('data' => $data));
		
		$after = $this->Enlace->read();
		$this->assertEquals($data['Enlace']['nombre'], $after['Enlace']['nombre']);
	}
	
	public function testFindName(){
		$this->Enlace->id = 1;
		$data = $this->Enlace->read();
		
		$buscar = array(
			'buscarEn' => 1,
			'Enlace' => array(
				'buscar' => $data['Enlace']['nombre']
			)
		);
		$this->testAction('/enlaces/index', array('data' => $buscar));
		$this->assertEquals($data, $this->vars['enlaces'][0]);
	}
	
	public function testFindLink(){
		$this->Enlace->id = 1;
		$data = $this->Enlace->read();
		
		$buscar = array(
			'buscarEn' => 2,
			'Enlace' => array(
				'buscar' => $data['Enlace']['direccion']
			)
		);
		$this->testAction('/enlaces/index', array('data' => $buscar));
		$this->assertEquals($data, $this->vars['enlaces'][0]);
	}
	
	public function testFindDescription(){
		$this->Enlace->id = 1;
		$data = $this->Enlace->read();
		
		$buscar = array(
			'buscarEn' => 3,
			'Enlace' => array(
				'buscar' => $data['Enlace']['descripcion']
			)
		);
		$this->testAction('/enlaces/index', array('data' => $buscar));
		$this->assertEquals($data, $this->vars['enlaces'][0]);
	}
	
}
?>