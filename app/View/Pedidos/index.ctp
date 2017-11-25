<?php

	echo $this->Html->script(array('searchPedido'));
	echo $this->fetch('script');

 ?>
<?php

	$this->Paginator->options(array(
		'update' => '#contenedor-pedidos',));

?>

<div id="contenedor-pedidos">

<div class="container">
	<div class="row">
			<div class="col-md-7 col-xs-12">
				<?php echo $this->element('navtabs-pedido-consulta'); ?>
			</div>	

			</div>
			<br >

	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">Pedidos</h3>
		</div>
		<div class="panel-body">
		<table class="table table-hover">
		<thead>
		<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('subestado_id'); ?></th>
			<th><?php echo $this->Paginator->sort('cliente_id'); ?></th>
			<th class="actions"><?php echo __('Acciones'); ?></th>
		</tr>
		</thead>
		<tbody>
		<?php foreach ($pedidos as $pedido): ?>
		<tr>
			<td><?php echo h($pedido['Pedido']['id']); ?>&nbsp;</td>
			<td>
				<?php echo $this->Html->link($pedido['Subestado']['nombre'], array('controller' => 'subestados', 'action' => 'view', $pedido['Subestado']['id'])); ?>
			</td>
			<td>
				<?php echo $this->Html->link($pedido['Cliente']['numero_cliente'], array('controller' => 'clientes', 'action' => 'view', $pedido['Cliente']['id'])); ?>
			</td>
			<td class="actions">
				<div class="btn-group">
					<?php echo $this->Html->link(__(''), array('action' => 'view', $pedido['Pedido']['id']), array('class'=>'btn btn-primary glyphicon glyphicon-search', 'title'=>'Ver Detalle de Usuario')); ?></li>
					<?php echo $this->Html->link(__(''), array('action' => 'edit', $pedido['Pedido']['id']),array('class'=>'btn btn-primary glyphicon glyphicon-pencil', 'title'=>'Editar Usuario')); ?></li>
					<div class="btn btn-primary glyphicon glyphicon-trash" data-toggle="modal" data-target="#eliminar" title="Eliminar Usuario"></div>
				 </div>
			</td>
		</tr>
	<?php endforeach; ?>
		</tbody>
		</table>
		</div>
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

<div class="modal fade" id="eliminar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">¿Estas seguro que deseas eliminar el registro seleccionado?</h4>
      </div>
      <div class="modal-footer center-block">
		<?php echo $this->Form->postLink(__('Eliminar'), array('action' => 'delete', $pedido['Pedido']['id']), array('class'=>'btn btn-danger', )); ?></li>
        <button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>