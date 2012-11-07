<h1>Blog Post</h1>
<?php 
echo $this->Form->create('Enlace');
echo $this->Form->input('buscar', array('label'=>'Buscar Links:'));
echo $this->Form->end('Buscar');

echo $this->Html->link('Agregar Enlace', array('controller' => 'enlaces', 'action' => 'add')); 
?>
<table>
	<tr>
        <th>Enlace</th>
        <th>Opciones</th>
    </tr>

    <?php foreach ($enlaces as $enlace): ?>
    <tr>
        <td><?php echo $this->Html->link($enlace['Enlace']['nombre'], array('controller' => 'enlaces', 'action' => 'view', $enlace['Enlace']['id'])); ?>
		<p><small><?php echo $enlace['Enlace']['direccion']?></small></p>
		
		<p><?php echo $enlace['Enlace']['descripcion']?></p>
		</td>
        <td><?php echo $this->Html->link('Editar', array('controller' => 'enlaces', 'action' => 'edit', $enlace['Enlace']['id'])); ?> 
			<?php echo $this->Form->postLink('Borrar', array('controller' => 'enlaces', 'action' => 'delete', $enlace['Enlace']['id']), array('confirm' => 'Borrar el enlace?')); ?></td>
    </tr>
    <?php endforeach; ?>

</table>