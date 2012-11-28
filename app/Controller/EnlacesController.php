<?php
App::uses('AppController','Controller');

class EnlacesController extends AppController{
	public $helpers = array('Html','Form');
	
	function index(){
		if ($this->request->is('post')) {
			$data = $this->request->data;
						
			if($data['buscarEn'] == 2){
				$result = $this->Enlace->find('all', array('conditions' => array('Enlace.direccion LIKE' => '%'.$data['Enlace']['buscar'].'%')));
			}else if ($data['buscarEn'] == 3){
				$result = $this->Enlace->find('all', array('conditions' => array('Enlace.descripcion LIKE' => '%'.$data['Enlace']['buscar'].'%')));
			}else{
				$result = $this->Enlace->find('all', array('conditions' => array('Enlace.nombre LIKE' => '%'.$data['Enlace']['buscar'].'%')));
			}
			
			$this->set('enlaces', $result);
		}else{
			$this->set('enlaces', $this->Enlace->find('all'));
		}
	}
	
	function add(){
		if($this->request->is('post')){
			if($this->Enlace->save($this->request->data)){
				$this->Session->setFlash('Tu enlace ha sido guardado.');
				$this->redirect(array('action'=>'index'));
			}
		}else{
			$this->set('directorios', $this->Enlace->Directorio->find('list'));
		}
	}
	
	function add($directorio_id = null){
		if($this->request->is('post')){
			if($this->Enlace->save($this->request->data)){
				$this->Session->setFlash('Tu enlace ha sido guardado.');
				$this->redirect(array('action'=>'index'));
			}
		}else{
			$this->set('directorios', $this->Enlace->Directorio->find('list'));
		}
	}
	
	function delete($id = null){
		if($this->Enlace->delete($id)){
			$this->Session->setFlash('El Enlace ha sido eliminado.');
			$this->redirect(array('action' => 'index'));
		}
	}
	
	function edit($id = null){
		$this->Enlace->id = $id;
		
		if($this->request->is('get')){
			$this->request->data = $this->Enlace->read();
			$this->set('directorios', $this->Enlace->Directorio->find('list'));
		}else{
			if($this->Enlace->save($this->request->data)){
				$this->Session->setFlash('El enlace ha sido modificado.');
				$this->redirect(array('action' => 'index'));
			}
		}
	}
	
	function view($id = null){
		$this->Enlace->id = $id;
		$this->set('enlace',$this->Enlace->read());
	}

}

?>