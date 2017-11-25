<?php

	echo $this->Html->script(array('searchProducto'));
	echo $this->fetch('script');

 ?>
<?php

	$this->Paginator->options(array(
		'update' => '#contenedor-productos',));

?>

<div id="contenedor-productos">

<div class="container">
	<div class="row">
			<div class="col-md-7 col-xs-12">
				<?php echo $this->element('navtabs-producto-consulta'); ?>
			</div>	
			<?php echo $this->Form->create('Producto', array('type'=>'GET', 'url'=>array('controller'=>'productos','action'=>'search'))); ?>
			<div class="col-xs-10 col-md-4">
					<div class="form-group">	
					<?php echo $this->Form->input('search',array('label'=>false, 'div'=>false, 'id'=>'searchProducto','class'=>'form-control','autocomplete'=>'off','placeholder'=>'Buscar Producto...')); ?>
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
			<h3 class="panel-title">Productos</h3>
		</div>
		<div class="panel-body">
		<table class="table table-hover">
		<thead>
		<tr>
			<th class="col-md-1 col-xs-2"><?php echo $this->Paginator->sort('id'); ?></th>
			<th class="col-md-2 hidden-xs hidden-sm"><?php echo $this->Paginator->sort('formula_id'); ?></th>
			<th  class="col-md-3 col-xs-3"><?php echo $this->Paginator->sort('nombre'); ?></th>
			<th  class="col-md-3 hidden-xs col-sm-4"><?php echo $this->Paginator->sort('detalle'); ?></th>
			<th class="col-md-5 col-xs-7"><?php echo __('Acciones'); ?></th>
		</tr>
		</thead>
		<tbody>
		<?php foreach ($productos as $producto): ?>
		<tr>
			<td class="col-md-1 col-xs-2"><?php echo h($producto['Producto']['id']); ?>&nbsp;</td>
			<td class="col-md-2 hidden-xs hidden-sm">
				<?php echo $this->Html->link($producto['Formula']['nombre'], array('controller' => 'formulas', 'action' => 'view', $producto['Formula']['id'])); ?>
			</td>
			<td class="col-md-3 col-xs-3"> <?php echo h($producto['Producto']['nombre']); ?>&nbsp;</td>
			<td class="col-md-3 hidden-xs col-sm-4"><?php echo h($producto['Producto']['detalle']); ?>&nbsp;</td>
			<td class="col-md-5 col-xs-7">
			<div class="btn-group">
				<?php echo $this->Html->link(__(''), array('action' => 'view', $producto['Producto']['id']), array('class'=>'btn btn-primary glyphicon glyphicon-search', 'title'=>'Ver Detalle de Producto')); ?></li>
				<?php echo $this->Html->link(__(''), array('action' => 'edit', $producto['Producto']['id']),array('class'=>'btn btn-primary glyphicon glyphicon-pencil', 'title'=>'Editar Producto')); ?></li>
				<?php echo $this->Form->postLink(__(''), array('action' => 'delete', $producto['Producto']['id']), array('class'=>'btn btn-primary glyphicon glyphicon-trash', 'title'=>'Eliminar Producto')); ?>
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