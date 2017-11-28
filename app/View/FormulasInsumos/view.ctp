<div class="formulasInsumos view">
<h2><?php echo __('Formulas Insumo'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($formulasInsumo['FormulasInsumo']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Formula'); ?></dt>
		<dd>
			<?php echo $this->Html->link($formulasInsumo['Formula']['nombre'], array('controller' => 'formulas', 'action' => 'view', $formulasInsumo['Formula']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Insumo'); ?></dt>
		<dd>
			<?php echo $this->Html->link($formulasInsumo['Insumo']['nombre'], array('controller' => 'insumos', 'action' => 'view', $formulasInsumo['Insumo']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cantidad'); ?></dt>
		<dd>
			<?php echo h($formulasInsumo['FormulasInsumo']['cantidad']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Formulas Insumo'), array('action' => 'edit', $formulasInsumo['FormulasInsumo']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Formulas Insumo'), array('action' => 'delete', $formulasInsumo['FormulasInsumo']['id']), array(), __('Are you sure you want to delete # %s?', $formulasInsumo['FormulasInsumo']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Formulas Insumos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Formulas Insumo'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Formulas'), array('controller' => 'formulas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Formula'), array('controller' => 'formulas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Insumos'), array('controller' => 'insumos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Insumo'), array('controller' => 'insumos', 'action' => 'add')); ?> </li>
	</ul>
</div>
