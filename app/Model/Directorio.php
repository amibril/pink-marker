<?php
class Directorio extends AppModel {
	public $displayField = 'nombre';
	
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
		)
	);
	
	public $hasMany = 'Enlace';
}
?>