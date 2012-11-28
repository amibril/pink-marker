<?php
class Enlace extends AppModel{
	public $validate = array(
		'nombre' => array(
			'No vacio' => array(
				'rule' => 'notEmpty',
				'message' => 'Debe inbresar un nombre para el enlace.'
			),
			'Unico' => array(
				'rule' => 'isUnique',
				'message' => 'Ese nombre de enlace ya esta registrado.'
			)
		)
	);
		
	public $belongsTo = 'Directorio';
}
?>