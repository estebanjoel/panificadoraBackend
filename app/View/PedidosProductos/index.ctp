<div class="container">
<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">Pedidos de Produccion</h3>
		</div>
		<div class="panel-body">
		<table class="table table-hover">
		<thead>
		<tr>
			<th><?php echo ('id'); ?></th>
			<th><?php echo ('pedido_id'); ?></th>
			<th><?php echo ('producto_id'); ?></th>
			<th><?php echo ('total'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($pedidosProductos as $pedidosProducto): ?>
	<tr>
		<td><?php echo h($pedidosProducto['PedidosProducto']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($pedidosProducto['pedidos']['subestado_id'], array('controller' => 'pedidos', 'action' => 'view',$pedidosProducto['pedidos']['subestado_id'])); ?>
		</td>
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
	 <p class="text-center">
			<br>
		<?php
		echo $this->Paginator->counter(array(
		'format' => __('Pagina {:page} de {:pages}, total {:count}')
		));
		?>	</p>
	</div>
	</div>
	<ul class="pagination center-block">
		<li><?php echo $this->Paginator->prev('< ' . __(''), array(), null, array('class' => 'prev disabled btn btn-primary')); ?></li>
		<li><?php echo $this->Paginator->numbers(array('separator' => '', 'tag'=>'li','currentTag' => 'a', 'currentClass' => 'active')); ?></li>
		<li><?php echo $this->Paginator->next(__('') . ' >', array(), null, array('class' => 'next disabled btn btn-primary'));	?></li>
	</ul>
</div>