<h1><?php echo $directorio['Directorio']['nombre']?></h1>
<?php 
$data = array(
	'Enlace' => array(
		'directorio_id' => $directorio['Directorio']['id']
	)
);
echo $this->Html->link('Agregar Enlace',array('controller'=>'enlaces', 'action'=>'add'));
?>
<table>
	<tr>
        <th>Nombre del Enlace</th>
    </tr>

    <?php foreach ($directorio['Enlace'] as $enlace): ?>
    <tr>
        <td>
		<?php echo $this->Html->link($enlace['nombre'], array('controller' => 'enlaces', 'action' => 'view', $enlace['id'])); ?>
		<p><small><?php echo $enlace['direccion']?></small></p>
		
		<p><?php echo $enlace['descripcion']?></p>
		
    <?php endforeach; ?>

</table>
