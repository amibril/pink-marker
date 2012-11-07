<h1>Editar Enlace</h1>

<?php
echo $this->Form->create('Enlace', array('action'=>'edit'));
echo $this->Form->input('nombre');
echo $this->Form->input('direccion');
echo $this->Form->input('descripcion', array('rows'=>'3'));
echo $this->Form->input('id', array('type'=>'hidden'));
echo $this->Form->end('Guardar Enlace');
?>