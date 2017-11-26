<?php

	$this->Paginator->options(array(
		'update' => '#contenedor-insumos',));

?>

<div id="contenedor-insumos">

<div class="container">
			<?php  if(($current_user['Role']['tipo'])=='Super Administrador' or ($current_user['Role']['tipo'])=='Encargado de Produccion'): ?>
		<div class="row">
             <div class="col-md-6 col-xs-12">
				<?php echo $this->element('navtabs-insumo-minimo'); ?>
			</div>	
			</div>
			<br>
		 <?php  endif; ?>

	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">Insumos con Stock Actual por debajo del Minimo</h3>
		</div>
		<div class="panel-body">
		<div class="table-responsive">
		<table class="table table-hover">
			<thead>
			<tr>
					<th><?php echo $this->Paginator->sort('id'); ?></th>
					<th><?php echo $this->Paginator->sort('nombre'); ?></th>
					<th><?php echo $this->Paginator->sort('stock'); ?></th>
					<th><?php echo $this->Paginator->sort('minimo'); ?></th>
					<?php  if(($current_user['Role']['tipo'])=='Super Administrador' or ($current_user['Role']['tipo'])=='Encargado de Produccion'): ?>
					<th class="actions"><?php echo __('Acciones'); ?></th>
				<?php endif; ?>
			</tr>
			</thead>
			<tbody>
			<?php foreach ($insumos as $insumo): ?>
			<tr>
				<td><?php echo h($insumo['Insumo']['id']); ?>&nbsp;</td>
				<td><?php echo h($insumo['Insumo']['nombre']); ?>&nbsp;</td>
				<td><?php echo h($insumo['Insumo']['stock']); ?>&nbsp;</td>
				<td><?php echo h($insumo['Insumo']['minimo']); ?>&nbsp;</td>
				<?php  if(($current_user['Role']['tipo'])=='Super Administrador' or ($current_user['Role']['tipo'])=='Encargado de Produccion'): ?>

				<td class="actions">
					<?php echo $this->Html->link(__(''), array('action' => 'add_stock', $insumo['Insumo']['id']),array('class'=>'btn btn-primary glyphicon glyphicon-plus-sign', 'title'=>'Agregar Stock')); ?>
				</td>
			<?php endif; ?>
			</tr>
		<?php endforeach; ?>
			</tbody>
			</table>
		</div>
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