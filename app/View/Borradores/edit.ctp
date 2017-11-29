<div class="borradores form">
<?php echo $this->Form->create('Borradore'); ?>

<?php echo $this->element('navtabs-borrador-consulta'); ?>
	<fieldset>
		<legend><?php echo __('Edit Borradore'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('formula_id');
		echo $this->Form->input('estado_id');
		echo $this->Form->input('nombre');
		echo $this->Form->input('descripcion');
		echo $this->Form->input('flag');
		echo $this->Form->input('Insumo');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Borradore.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Borradore.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Borradores'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Formulas'), array('controller' => 'formulas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Formula'), array('controller' => 'formulas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Estados'), array('controller' => 'estados', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Estado'), array('controller' => 'estados', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Insumos'), array('controller' => 'insumos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Insumo'), array('controller' => 'insumos', 'action' => 'add')); ?> </li>
	</ul>
</div>
