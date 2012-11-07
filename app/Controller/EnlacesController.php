<?php 
App::uses('AppController', 'Controller');

class EnlacesController extends AppController {
	public $helpers = array('Html','Form');

	function index() {
        if ($this->request->is('post')) {
			$data = $this->request->data;
			$this->set('enlaces', $this->Enlace->find('all', array('conditions' => array('Enlace.nombre LIKE' => '%'.$data['Enlace']['buscar'].'%'))));
		}else{
			$this->set('enlaces', $this->Enlace->find('all'));
		}
	
	}
	
	function view($id = null){
		$this->Enlace->id = $id;
		$this->set('enlace',$this->Enlace->read());
	}
	
	function add() {
        if ($this->request->is('post')) {
            if ($this->Enlace->save($this->request->data)) {
                $this->Session->setFlash('Tu enlace ha sido guardado.');
				$this->redirect(array('action' => 'index'));
            }
        }
    }
	
	function edit($id = null) {
		$this->Enlace->id = $id;
		if($this->request->is('get')){
			$this->request->data = $this->Enlace->read();
		}else{
			if($this->Enlace->save($this->request->data)){
				$this->Session->setFlash('Tu enlace ha sido editado.');
				$this->redirect(array('action' => 'index'));
			}
		}
		
	}
	
	function delete($id = null) {
		$this->Enlace->id = $id;
		if(!$this->request->is('post')){
			throw new MethodNotAllowedException();
		}
		if($this->Enlace->delete($id)){
			$this->Session->setFlash('El enlace ha sido eliminado.');
			$this->redirect(array('action' => 'index'));
		}
	}
}
?>