<?php 
App::uses('AppController', 'Controller');

class DirectoriosController extends AppController {
	public $helpers = array('Html','Form');

	function index() {
		$this->set('directorios', $this->Directorio->find('all'));
	}
	
	function view($id = null){
		$this->Directorio->id = $id;
		$this->set('directorio',$this->Directorio->read());
		// $this->set('directorio',$this->Directorio->read());
	}
	
	function add() {
        if ($this->request->is('post')) {
            if ($this->Directorio->save($this->request->data)) {
                $this->Session->setFlash('Tu directorio ha sido guardado.');
				$this->redirect(array('action' => 'index'));
            }
        }
    }
	
	function edit($id = null){
		$this->Directorio->id = $id;
		
		if($this->request->is('get')){
			$this->request->data = $this->Directorio->read();
		}else{
			if($this->Directorio->save($this->request->data)){
				$this->Session->setFlash('El directorio ha sido modificado.');
				$this->redirect(array('action' => 'index'));
			}
		}
	}
	
	function delete($id = null){
		if($this->Directorio->delete($id)){
			$this->Session->setFlash('El directorio ha sido eliminado.');
			$this->redirect(array('action' => 'index'));
		}
	}
}
?>