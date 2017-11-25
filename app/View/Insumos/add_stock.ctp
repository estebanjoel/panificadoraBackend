<<div class="container">
	<?php echo $this->Form->create('Insumo'); ?>
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title"><?php echo ('Agregar Stock'); ?></h3>
  		</div>
		<div class="panel-body">
			<form class="form-horizontal">
				<?php
					echo $this->Form->input('stock',array('class'=>'form-control', 'label'=>'Ingrese la cantidad de stock a agregar'));
				?>
				<br><div class="center-block"><?php echo $this->Form->end(__('Enviar')); ?></div>
			</form>
		</div>
	</div>
</div>