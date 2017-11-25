<?php

	echo $this->Html->script(array('searchCliente'));
	echo $this->fetch('script');

 ?>
<?php

	$this->Paginator->options(array(
		'update' => '#contenedor-clientes',));

?>

<div id="contenedor-clientes">

<div class="container">
		<div class="row">
			<div class="col-md-7 col-xs-12">
				<?php echo $this->element('navtabs-cliente-consulta'); ?>
			</div>	
			<?php echo $this->Form->create('Cliente', array('type'=>'GET', 'url'=>array('controller'=>'clientes','action'=>'search'))); ?>
			<div class="col-xs-10 col-md-4">
					<div class="form-group">	
					<?php echo $this->Form->input('search',array('label'=>false, 'div'=>false, 'id'=>'searchCliente','class'=>'form-control','autocomplete'=>'off','placeholder'=>'Buscar Cliente...')); ?>
					</div>
			</div>
			<div class="col-md-1 col-xs-2">
				<?php echo $this->Form->button('',array('div'=>false, 'class'=>'pull-left btn btn-primary glyphicon glyphicon-search')); ?>	
				</div>
			<?php echo $this->Form->end(); ?>
		</div>
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">Clientes</h3>
		</div>
		<div class="panel-body">
		<table class="table table-hover">
		<thead>
		<tr>
			<th class="col-lg-1 col-md-1 col-sm-1 col-xs-2"><?php echo $this->Paginator->sort('id'); ?></th>
			<th class="col-lg-2 col-md-2 col-sm-2 col-xs-3"><?php echo $this->Paginator->sort('N° Cliente'); ?></th>
			<th class="col-lg-1 col-md-1 hidden-sm hidden-xs"><?php echo $this->Paginator->sort('nombre'); ?></th>
			<th class="col-lg-2 col-md-2 hidden-sm hidden-xs"><?php echo $this->Paginator->sort('apellido'); ?></th>
			<th class="col-lg-1 col-md-1 hidden-sm hidden-xs"><?php echo $this->Paginator->sort('dni'); ?></th>
			<th class="col-lg-2 col-md-2 col-sm-2 hidden-xs"><?php echo $this->Paginator->sort('email'); ?></th>
			<th class="col-lg-4 col-md-4 col-sm-5 col-xs-7"><?php echo __('Acciones'); ?></th>
		</tr>
		</thead>
		<tbody>
		<?php foreach ($clientes as $cliente): ?>
		<tr>
			<td class="col-lg-1 col-md-1 col-sm-1 col-xs-2"><?php echo h($cliente['Cliente']['id']); ?>&nbsp;</td>
			<td class="col-lg-2 col-md-2 col-sm-2 col-xs-1"><?php echo h($cliente['Cliente']['numero_cliente']); ?>&nbsp;</td>
			<td class="col-lg-1 col-md-1 hidden-sm hidden-xs"><?php echo h($cliente['Cliente']['nombre']); ?>&nbsp;</td>
			<td class="col-lg-1 col-md-2 hidden-sm hidden-xs"><?php echo h($cliente['Cliente']['apellido']); ?>&nbsp;</td>
			<td class="col-lg-1 col-md-1 hidden-sm hidden-xs"><?php echo h($cliente['Cliente']['dni']); ?>&nbsp;</td>
			<td class="col-lg-2 col-md-2 col-sm-2 hidden-xs"><?php echo h($cliente['Cliente']['email']); ?>&nbsp;</td>
			<td class="col-lg-4 col-md-4 col-sm-5 col-xs-7">
							<!-- Single button -->
			<div class="btn-group">
				<?php echo $this->Html->link(__(''), array('action' => 'view', $cliente['Cliente']['id']), array('class'=>'btn btn-primary glyphicon glyphicon-search', 'title'=>'Ver Detalle de Cliente')); ?>
				<?php echo $this->Html->link(__(''), array('action' => 'edit', $cliente['Cliente']['id']),array('class'=>'btn btn-primary glyphicon glyphicon-pencil', 'title'=>'Editar Cliente')); ?>
				<?php echo $this->Form->postLink(__(''), array('action' => 'delete', $cliente['Cliente']['id']), array('class'=>'btn btn-primary glyphicon glyphicon-trash', 'title'=>'Eliminar Cliente')); ?>
			</div>
		</td>
		</tr>
		<?php endforeach; ?>
		</tbody>
		</table>
		<p class="text-center"><br><?php echo $this->Paginator->counter(array('format' => __('Pagina {:page} de {:pages}, total {:count}')));?>	</p>
		</div>
	</div>
	<ul class="pagination center-block">
		<li><?php echo $this->Paginator->prev('< ' . __(''), array(), null, array('class' => 'prev disabled btn btn-primary')); ?></li>
		<li><?php echo $this->Paginator->numbers(array('separator' => '', 'tag'=>'li','currentTag' => 'a', 'currentClass' => 'active')); ?></li>
		<li><?php echo $this->Paginator->next(__('') . ' >', array(), null, array('class' => 'next disabled btn btn-primary'));	?></li>
	</ul>
</div>
</div>