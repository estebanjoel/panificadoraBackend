<div class="container">
	<?php echo $this->element('navtabs-pedidoProductos-editar'); ?>
<?php echo $this->Form->create('PedidosProducto'); ?>
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title"><?php echo ('Cambiar Estado de Pedido de Produccion') ?></h3>
		</div>
		<div class="panel-body">
		<form class="form-horizontal"></form>
		<?php
			echo $this->Form->input('subestado_id',array('class'=>'form-control'));
		?>
		<br><div class="center-block"><?php echo $this->Form->end(__('Enviar')); ?></div>
			</form>
		</div>
	</div>
</div>