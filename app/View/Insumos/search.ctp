<?php

	echo $this->Html->script(array('searchInsumo'));
	echo $this->fetch('script');

 ?>
<?php if($ajax !=1): ?>
<div class="container">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">Buscar Insumo</h3>
		</div>
		<div class="panel-body">
	<div class="row">
		<?php echo $this->Form->create('Insumo', array('type'=>'GET'),array('class'=>'form-inline')); ?>
		<div class="col-sm-11 col-xs-10">
			<?php echo $this->Form->input('search',array('label'=>false, 'div'=>false, 'class'=>'form-control','autocomplete'=>'off','id'=>'searchProducto')); ?>
		</div>
		<div class="col-sm-1 col-xs-2">
			<?php echo $this->Form->button('',array('div'=>false, 'class'=>'btn btn-primary glyphicon glyphicon-search')); ?>
		</div>
		<?php echo $this->Form->end(); ?>
	</div> <br>
<?php endif ?>

<?php if(!empty($search)): ?>

	<?php if(!empty($insumos)): ?>
		
		<div class="alert alert-info text-center">Se ha encontrado mas de un resultado. Seleccione la opcion que buscaba:</div>
		<table class="table table-bordered table-hover">
			<thead>
			<tr>
				<th><?php echo ('id'); ?></th>
				<th><?php echo ('nombre'); ?></th>
				<th class="hidden-xs"><?php echo ('stock'); ?></th>
				<th class="hidden-xs"><?php echo ('minimo'); ?></th>
				<th><?php echo __('Detalle'); ?></th>
			</tr>
			</thead>
		<?php foreach($insumos as $insumo): ?>
			<tbody>
			<tr>
				<td><?php echo h($insumo['Insumo']['id']); ?>&nbsp;</td>
				<td><?php echo h($insumo['Insumo']['nombre']); ?>&nbsp;</td>
				<td class="hidden-xs"><?php echo h($insumo['Insumo']['stock']); ?>&nbsp;</td>
				<td class="hidden-xs"><?php echo h($insumo['Insumo']['minimo']); ?>&nbsp;</td>
				<td>
					<div class="btn-group">
						<?php echo $this->Html->link(__(''), array('action' => 'view', $insumo['Insumo']['id']), array('class'=>'btn btn-primary glyphicon glyphicon-search', 'title'=>'Ver Detalle de Insumo')); ?>
					</div>
				</td>
			</tr>
			</tbody>
		<?php endforeach; ?>
		</table>
		<br><br><br>
	</div>

	<?php endif; ?>
	<?php else: ?>
		</div>
	</div>

<?php endif ?>
	</div>
	<div class="center-block"><?php echo $this->Html->link(__('Volver'), array('action' => 'index'), array('type'=>'button','class'=>'btn btn-primary')); ?></div>
</div>