<?php
class EnlacesControllerTest extends ControllerTestCase{
	public $fixtures = array('app.enlace');
	
	public function setup(){
		parent::setUp();
		$this->Enlace = ClassRegistry::init('Enlace');
	}

	public function testAdd() {
		$data = array(
			'Enlace' => array(
				'nombre' => 'YouTUBE',
				'direccion' => 'www.youtube.com',
				'descripcion' => 'Red social de videos.'
			));

		$before = $this->Enlace->find('count');
		
		$this->testAction('/enlaces/add', array('data' => $data, 'method' => 'post'));	
		
		$after = $this->Enlace->find('count');
		$this->assertEquals($after, $before+1);
		
		$result = $this->Enlace->find('count', array('conditions' => array('Enlace.nombre' => $data['Enlace']['nombre'], 'Enlace.direccion' => $data['Enlace']['direccion'], 'Enlace.descripcion' => $data['Enlace']['descripcion'])));
		$this->assertNotEmpty($result, 'El registro no aparece en la BD.');
		
	}
	
	public function testEdit(){
		$data = array(
			'Enlace' => array(
				'id' => 2,
				'nombre' => 'YouTUBE',
				'direccion' => 'www.youtube.com',
				'descripcion' => 'Red social de videos.'
			));
			
		$this->testAction('/enlaces/edit', array('data' => $data));	
		
		$result = $this->Enlace->find('first', array('conditions' => array('Enlace.id' => $data['Enlace']['id'])));
		
		$this->assertEquals($data['Enlace']['nombre'], $result['Enlace']['nombre']);
		$this->assertEquals($data['Enlace']['direccion'], $result['Enlace']['direccion']);
		$this->assertEquals($data['Enlace']['descripcion'], $result['Enlace']['descripcion']);
		
	}
	
	public function testDelete(){
		$before = $this->Enlace->find('count');
		
		$this->testAction('/enlaces/delete/1');
		
		$after = $this->Enlace->find('count');
		$this->assertEquals($after, $before-1);
	}
	
	public function testFindName(){
		$this->Enlace->id = 2;
		$data = $this->Enlace->read();
		
		$buscar = array(
			'Enlace' => array(
				'buscar' => $data['Enlace']['nombre']
			)
		);
		$this->testAction('/enlaces/index', array('data' => $buscar));
		$this->assertEquals($data, $this->vars['enlaces'][0]);
	}
	
	public function testFindLink(){
		$this->Enlace->id = 2;
		$data = $this->Enlace->read();
		
		$buscar = array(
			'Enlace' => array(
				'buscar' => $data['Enlace']['direccion']
			)
		);
		$this->testAction('/enlaces/index', array('data' => $buscar));
		$this->assertEquals($data, $this->vars['enlaces'][0]);
	}
}
?>