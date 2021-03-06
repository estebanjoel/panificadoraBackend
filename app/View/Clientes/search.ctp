<?php

	echo $this->Html->script(array('searchCliente'));
	echo $this->fetch('script');

 ?>
<?php if($ajax !=1): ?>
<div class="container">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">Buscar Cliente</h3>
		</div>
		<div class="panel-body">
	<div class="row">
		<?php echo $this->Form->create('Cliente', array('type'=>'GET'),array('class'=>'form-inline')); ?>
		<div class="col-sm-11 col-xs-10">
			<?php echo $this->Form->input('search',array('label'=>false, 'div'=>false, 'class'=>'form-control','autocomplete'=>'off','value'=>$search)); ?>
		</div>
		<div class="col-sm-1 col-xs-2">
			<?php echo $this->Form->button('',array('div'=>false, 'class'=>'btn btn-primary glyphicon glyphicon-search')); ?>
		</div>
		<?php echo $this->Form->end(); ?>
	</div> <br>
<?php endif ?>

<?php if(!empty($search)): ?>

	<?php if(!empty($clientes)): ?>
		
	<div class="row">
		<div class="alert alert-info text-center">Se ha encontrado mas de un resultado. Seleccione la opcion que buscaba:</div>
		<?php foreach($clientes as $cliente): ?>
			<div class="col-md-4 col-xs-4">
				<?php echo $this->Html->link($cliente['Cliente']['nombre']." ".$cliente['Cliente']['apellido'], array('action'=>'view', $cliente['Cliente']['id']),array('class'=>'center-block btn btn-primary')); ?>
			</div>
		<?php endforeach; ?>
		<br><br><br>
	</div>

	<?php endif; ?>
	<?php else: ?>
		</div>
	</div>
		<div class="alert alert-danger text-center">No se ha encontrado el Cliente que busca</div>
		<div class="center-block"><?php echo $this->Html->link(__('Volver'), array('action' => 'index'), array('type'=>'button','class'=>'btn btn-primary')); ?></div>

<?php endif ?>
</div>