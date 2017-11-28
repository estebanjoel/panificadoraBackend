<div class="container">
<?php echo $this->element('navtabs-pedidoProductos-Realizado'); ?>
<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">Pedidos de Produccion</h3>
		</div>
		<div class="panel-body">
		<table class="table table-hover">
		<thead>
		<tr>
			<th><?php echo ('id'); ?></th>
			<th><?php echo ('Producto'); ?></th>
			<th><?php echo ('Total'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($pedidosProductos as $pedidosProducto): ?>
	<tr>
		<td><?php echo h($pedidosProducto['PedidosProducto']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($pedidosProducto['productos']['nombre'], array('controller' => 'productos', 'action' => 'view'),$pedidosProducto['PedidosProducto']['producto_id']); ?>
		</td>
		<td><?php echo h($pedidosProducto[0]['total']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__(''), array('action' => 'edit', $pedidosProducto['PedidosProducto']['id']),array('class'=>'btn btn-primary glyphicon glyphicon-pencil','title'=>'Cambiar Estado de Pedido')); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
</div>