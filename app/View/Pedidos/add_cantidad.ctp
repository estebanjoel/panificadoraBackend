<div class="container">
	<?php echo $this->element('navtabs-pedido-alta'); ?>
	<?php echo $this->Form->create('Formula'); ?>
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title"><?php echo ('Agregue la Cantidad de cada Insumo'); ?></h3>
  		</div>
  	<div class="panel-body">
		<form class="form-horizontal">
			<?php $datos=[];?>
			<?php $i=0;?>
			<?php foreach ($productos as $producto):
			?>
			<?php echo $this->Form->input($producto['PedidosProducto']['cantidad'],array('class'=>'form-control','label'=>$pedido['Producto'][$i]['nombre'],'name'=>'datos[]')); ?>
			<?php array_push($datos,$producto['PedidosProducto']['cantidad'])?>
			<?php $i++?>
			<?php endforeach;?>
		<br><div class="center-block"><?php echo $this->Form->end('Enviar'); ?></div>
		</form>
	</div>
	</div>
</div>
