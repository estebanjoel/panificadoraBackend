<div class="container">
	<?php echo $this->element('navtabs-formula-alta'); ?>
	<?php echo $this->Form->create('Formula'); ?>
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title"><?php echo ('Dar de Alta una Formula'); ?></h3>
  		</div>
	<div class="panel-body">
		<form class="form-horizontal">
			<?php
				echo $this->Form->input('estado_id',array('class'=>'form-control hidden', 'label'=>false,'value'=>1));
				echo $this->Form->input('nombre',array('class'=>'form-control')).'<br />';
				echo $this->Form->input('descripcion',array('class'=>'form-control','type'=>'textarea','label'=>'Ingredientes')).'<br />';?>
				<div class="form-group">
					<label>Insumos:</label>
					<?php echo $this->Form->input('Insumo',array('label'=>false,'class'=>'checkbox-inline','multiple'=>'checkbox')); ?>
				</div>
			<br><div class="center-block"><?php echo $this->Form->end(('Enviar')); ?></div>
		</form>
	</div>
	</div>
</div>
