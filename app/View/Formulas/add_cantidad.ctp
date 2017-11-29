<div class="container">
	<?php echo $this->element('navtabs-formula-alta'); ?>
	<?php echo $this->Form->create('Formula'); ?>
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title"><?php echo ('Agregue la Cantidad de cada Insumo'); ?></h3>
  		</div>
  	<div class="panel-body">
		<form class="form-horizontal">
			<?php $datos=[];?>
			<?php $i=0;?>
			<?php foreach ($insumos as $insumo):?>
			<?php echo $this->Form->input($insumo['FormulasInsumo']['cantidad'],array('class'=>'form-control','label'=>$formula['Insumo'][$i]['nombre'],'name'=>'datos[]')); ?>
			<?php array_push($datos,$insumo['FormulasInsumo']['cantidad'])?>
			<?php $i++?>
			<?php endforeach;?>
		<br><div class="center-block"><?php echo $this->Form->end('Enviar'); ?></div>
		</form>
	</div>
	</div>
</div>
