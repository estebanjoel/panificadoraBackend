<div class="pedidos form">
<?php echo $this->Form->create('Pedido'); ?>
	<fieldset>
		<legend><?php echo __('Edit Pedido'); ?></legend>
	<?php
		echo $this->Form->input('subestado_id');
		echo $this->Form->input('cliente_id');
		echo $this->Form->input('Producto');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
