<div class="formulasInsumos form">
<?php echo $this->Form->create('FormulasInsumo'); ?>
	<fieldset>
		<legend><?php echo __('Edit Formulas Insumo'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('formula_id');
		echo $this->Form->input('insumo_id');
		echo $this->Form->input('cantidad');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('FormulasInsumo.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('FormulasInsumo.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Formulas Insumos'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Formulas'), array('controller' => 'formulas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Formula'), array('controller' => 'formulas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Insumos'), array('controller' => 'insumos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Insumo'), array('controller' => 'insumos', 'action' => 'add')); ?> </li>
	</ul>
</div>
