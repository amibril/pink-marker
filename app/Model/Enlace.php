<?php
class Enlace extends AppModel {
	public $validate = array(
		'nombre' => array (
			'No vacio' => array(
				'rule' => 'notEmpty',
				'message' => 'Debe Ingresar un nombre.'	
			),
			'Unico' => array(
				'rule' => 'isUnique',
				'message' => 'Ese nombre ya esta registrado.'	
			)
		),
		'direccion' => array (
			'Url calida' => array(
				'rule' => 'url',
				'message' => 'La direccion debe ser una URL valida.'
			),
			'Unico' => array(
				'rule' => 'isUnique',
				'message' => 'Esa direccion de enlace ya fue registrada.'	
			)
		));
		
}
?>