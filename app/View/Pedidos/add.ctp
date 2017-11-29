<div class="container">
	<?php echo $this->element('navtabs-pedido-alta'); ?>
	<?php echo $this->Form->create('Pedido'); ?>
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title"><?php echo ('Dar de Alta un Pedido de Cliente'); ?></h3>
  		</div>
	<div class="panel-body">
		<form class="form-horizontal">
	<?php
		echo $this->Form->input('estado_id',array('class'=>'form-control hidden', 'label'=>false,'value'=>1));
		echo $this->Form->input('subestado_id',array('class'=>'form-control hidden', 'label'=>false,'value'=>1));
		echo $this->Form->input('cliente_id',array('class'=>'form-control')).'<br />';?>
		<div class="form-group">
					<label>Productos:</label>
					<ul class="list-group">
					<?php echo $this->Form->input('Producto',array('type'=>'select','label'=>false,'class'=>' list-group-item','multiple'=>'checkbox')); ?>
					</ul>
				</div>
		<label>Fecha</label>
		<?php echo $this->Form->text('fecha',array('class'=>'form-control','type'=>'date'));
	?>
</div>
			<br><div class="center-block"><?php echo $this->Form->end(('Enviar')); ?></div>
		</form>
	</div>
	</div>
</div>
