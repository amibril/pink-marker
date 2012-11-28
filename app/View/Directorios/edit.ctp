<h1>Editar Directorio</h1>
<?php
echo $this->Form->create('Directorio');
echo $this->Form->input('id', array('type' => 'hidden'));
echo $this->Form->input('nombre');
echo $this->Form->end('Guardar');
?>