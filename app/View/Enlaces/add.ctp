<h1>Agregar Enlace</h1>
<?php
echo $this->Form->create('Enlace');
echo $this->Form->input('directorio_id');
echo $this->Form->input('nombre');
echo $this->Form->input('direccion');
echo $this->Form->input('descripcion', array('rows' => '3'));
echo $this->Form->end('Guardar Enlace');
?>