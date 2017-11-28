<div class="formulasInsumos index">
	<h2><?php echo __('Formulas Insumos'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('formula_id'); ?></th>
			<th><?php echo $this->Paginator->sort('insumo_id'); ?></th>
			<th><?php echo $this->Paginator->sort('cantidad'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($formulasInsumos as $formulasInsumo): ?>
	<tr>
		<td><?php echo h($formulasInsumo['FormulasInsumo']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($formulasInsumo['Formula']['nombre'], array('controller' => 'formulas', 'action' => 'view', $formulasInsumo['Formula']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($formulasInsumo['Insumo']['nombre'], array('controller' => 'insumos', 'action' => 'view', $formulasInsumo['Insumo']['id'])); ?>
		</td>
		<td><?php echo h($formulasInsumo['FormulasInsumo']['cantidad']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $formulasInsumo['FormulasInsumo']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $formulasInsumo['FormulasInsumo']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $formulasInsumo['FormulasInsumo']['id']), array(), __('Are you sure you want to delete # %s?', $formulasInsumo['FormulasInsumo']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Formulas Insumo'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Formulas'), array('controller' => 'formulas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Formula'), array('controller' => 'formulas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Insumos'), array('controller' => 'insumos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Insumo'), array('controller' => 'insumos', 'action' => 'add')); ?> </li>
	</ul>
</div>
