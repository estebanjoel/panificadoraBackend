<div class="container">
	<?php echo $this->element('navtabs-cliente-alta'); ?>
	<?php echo $this->Form->create('Cliente'); ?>
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title"><?php echo ('Dar de Alta un Usuario'); ?></h3>
  		</div>
	<div class="panel-body">
		<form class="form-horizontal">
		<?php
			echo $this->Form->input('estado_id',array('class'=>'form-control hidden', 'label'=>false,'value'=>1));
			echo $this->Form->input('numero_cliente',array('class'=>'form-control')).'<br />';
			echo $this->Form->input('nombre',array('class'=>'form-control')).'<br />';
			echo $this->Form->input('apellido',array('class'=>'form-control')).'<br />';
			echo $this->Form->input('dni',array('class'=>'form-control')).'<br />';
			echo $this->Form->input('telefono',array('class'=>'form-control')).'<br />';
			echo $this->Form->input('email',array('class'=>'form-control')).'<br />';
		?>
		<br><div class="center-block"><?php echo $this->Form->end(('Enviar')); ?></div>
		</form>
	</div>
	</div>
</div>