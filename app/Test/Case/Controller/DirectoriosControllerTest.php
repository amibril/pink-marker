<?php
class DirectoriosControllerTest extends ControllerTestCase{
	public $fixtures = array('app.directorio', 'app.enlace');
	
	public function setup(){
		parent::setUp();
		$this->Directorio = ClassRegistry::init('Directorio');
	}

	public function testAdd() {
		$data = array(
			'Directorio' => array(
				'nombre' => 'Buscadores',
			));

		$before = $this->Directorio->find('count');
		
		$this->testAction('/directorios/add', array('data' => $data, 'method' => 'post'));	
		
		$after = $this->Directorio->find('count');
		$this->assertEquals($after, $before+1);
		
		$result = $this->Directorio->find('count', array('conditions' => array('Directorio.nombre' => $data['Directorio']['nombre'])));
		$this->assertNotEmpty($result, 'El registro no aparece en la BD.');
		
	}
	
	public function testEdit(){
		$id = 1;
		$this->Directorio->id = $id;
		$before = $this->Directorio->read();
		
		$data = array(
			'Directorio' => array(
				'id' => $id,
				'nombre' => $before['Directorio']['nombre'].'MOD'
			)
		);
		
		$this->testAction('/directorios/edit', array('data' => $data));
		
		$after = $this->Directorio->read();
		$this->assertEquals($data['Directorio']['nombre'], $after['Directorio']['nombre']);
	}
	
	function testDelete(){		
		$before = $this->Directorio->find('count');
		
		$this->testAction('/directorios/delete/1', array('method' => 'get'));
		
		$after = $this->Directorio->find('count');
		$this->assertEquals($before-1, $after);
	}
}
?>