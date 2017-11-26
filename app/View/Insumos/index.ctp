<?php

	echo $this->Html->script(array('searchInsumo'));
	echo $this->fetch('script');

 ?>
<?php

	$this->Paginator->options(array(
		'update' => '#contenedor-insumos',));

?>

<div id="contenedor-insumos">

<div class="container">
		<div class="row">
			<div class="col-md-7 col-xs-12">
				<?php echo $this->element('navtabs-insumo-consulta'); ?>
			</div>	
			<?php echo $this->Form->create('Insumo', array('type'=>'GET', 'url'=>array('controller'=>'insumos','action'=>'search'))); ?>
			<div class="col-xs-10 col-md-4">
					<div class="form-group">	
					<?php echo $this->Form->input('search',array('label'=>false, 'div'=>false, 'id'=>'searchInsumo','class'=>'form-control','autocomplete'=>'off','placeholder'=>'Buscar Insumo...')); ?>
					</div>
			</div>
			<div class="col-md-1 col-xs-2">
					<?php echo $this->Form->button('',array('div'=>false, 'class'=>'pull-left btn btn-primary glyphicon glyphicon-search')); ?>
					
			</div>
			<?php echo $this->Form->end(); ?>
			</div>
			<br>

	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">Insumos</h3>
		</div>
		<div class="panel-body">
		<table class="table table-hover">
			<thead>
			<tr>
					<th><?php echo $this->Paginator->sort('id'); ?></th>
					<th><?php echo $this->Paginator->sort('nombre'); ?></th>
					<th class="hidden-xs"><?php echo $this->Paginator->sort('stock'); ?></th>
					<th class="hidden-xs"><?php echo $this->Paginator->sort('minimo'); ?></th>
					<th class="actions"><?php echo __('Acciones'); ?></th>
			</tr>
			</thead>
			<tbody>
			<?php foreach ($insumos as $insumo): ?>
			<tr>
				<td><?php echo h($insumo['Insumo']['id']); ?>&nbsp;</td>
				<td><?php echo h($insumo['Insumo']['nombre']); ?>&nbsp;</td>
				<td class="hidden-xs"><?php echo h($insumo['Insumo']['stock']); ?>&nbsp;</td>
				<td class="hidden-xs"><?php echo h($insumo['Insumo']['minimo']); ?>&nbsp;</td>
				<td class="actions">
					<div class="btn-group">
						<?php echo $this->Html->link(__(''), array('action' => 'view', $insumo['Insumo']['id']), array('class'=>'btn btn-primary glyphicon glyphicon-search', 'title'=>'Ver Detalle de Insumo')); ?>
						<?php echo $this->Html->link(__(''), array('action' => 'edit', $insumo['Insumo']['id']),array('class'=>'btn btn-primary glyphicon glyphicon-pencil', 'title'=>'Editar Insumo')); ?>
						<?php echo $this->Form->postLink(__(''), array('action' => 'delete', $insumo['Insumo']['id']), array('class'=>'btn btn-primary glyphicon glyphicon-trash', 'title'=>'Eliminar Insumo')); ?></li>
						<?php echo $this->Html->link(__(''), array('action' => 'add_stock', $insumo['Insumo']['id']),array('class'=>'btn btn-primary glyphicon glyphicon-plus-sign', 'title'=>'Agregar Stock')); ?>
					</div>
				</td>
			</tr>
		<?php endforeach; ?>
			</tbody>
			</table>
		</div>
		<p class="text-center"><br><?php echo $this->Paginator->counter(array('format' => __('Pagina {:page} de {:pages}, total {:count}')));?>	</p>
	</div>
	<ul class="pagination center-block">
		<li><?php echo $this->Paginator->prev('< ' . __(''), array(), null, array('class' => 'prev disabled btn btn-primary')); ?></li>
		<li><?php echo $this->Paginator->numbers(array('separator' => '', 'tag'=>'li','currentTag' => 'a', 'currentClass' => 'active')); ?></li>
		<li><?php echo $this->Paginator->next(__('') . ' >', array(), null, array('class' => 'next disabled btn btn-primary'));	?></li>
	</ul>

</div>
</div>