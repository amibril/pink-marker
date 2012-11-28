<h1>Directorios</h1>

<?php echo $this->Html->link('Agregar Directorio', array('action'=>'add'));?>

<table>
	<tr>
        <th>Nombre del Directorio</th>
        <th>Opciones</th>
    </tr>

    <?php foreach ($directorios as $directorio): ?>
    <tr>
        <td><?php echo $this->Html->link($directorio['Directorio']['nombre'], array('controller' => 'directorios', 'action' => 'view', $directorio['Directorio']['id'])); ?></td>
        <td><?php echo $this->Html->link('Editar', array('controller' => 'directorios', 'action' => 'edit', $directorio['Directorio']['id'])); ?> 
			<?php echo $this->Form->postLink('Borrar', array('controller' => 'directorios', 'action' => 'delete', $directorio['Directorio']['id']), array('confirm' => 'Borrar el Directorio?')); ?></td>
    </tr>
    <?php endforeach; ?>

</table>