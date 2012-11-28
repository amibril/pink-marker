<h1>Enlaces</h1>
<?php 
echo $this->Form->create('Enlace');
echo $this->Form->input('buscar', array('label'=>'Buscar Links:'));
?>
<div class="input select">
<label for="buscarEn">Buscar en:</label>
<select name="buscarEn" id="buscarEn">
<option value="1">Nombre</option>
<option value="2">Direccion</option>
<option value="3">Descripcion</option>
</select></div>

<?php echo $this->Form->end('Buscar');

echo $this->Html->link('Agregar Enlace', array('action' => 'add')); 
?>

<table>
	<tr>
        <th>Nombre del Enlace</th>
        <th>Opciones</th>
    </tr>

    <?php foreach ($enlaces as $enlace): ?>
    <tr>
        <td>
		<?php echo $this->Html->link($enlace['Enlace']['nombre'], array('controller' => 'enlaces', 'action' => 'view', $enlace['Enlace']['id'])); ?>
		<p><small><?php echo $enlace['Enlace']['direccion']?></small></p>
		<p><small>\<?php echo $enlace['Directorio']['nombre']?></small></p>
		
		<p><?php echo $enlace['Enlace']['descripcion']?></p>
		</td>
        <td><?php echo $this->Html->link('Editar', array('controller' => 'enlaces', 'action' => 'edit', $enlace['Enlace']['id'])); ?> 
			<?php echo $this->Form->postLink('Borrar', array('controller' => 'enlaces', 'action' => 'delete', $enlace['Enlace']['id']), array('confirm' => 'Borrar el Enlace?')); ?></td>
    </tr>
    <?php endforeach; ?>

</table>