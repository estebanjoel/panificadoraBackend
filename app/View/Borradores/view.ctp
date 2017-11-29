<div class="borradores view">
<h2><?php echo __('Borradore'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($borradore['Borradore']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Formula'); ?></dt>
		<dd>
			<?php echo $this->Html->link($borradore['Formula']['nombre'], array('controller' => 'formulas', 'action' => 'view', $borradore['Formula']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Estado'); ?></dt>
		<dd>
			<?php echo $this->Html->link($borradore['Estado']['nombre'], array('controller' => 'estados', 'action' => 'view', $borradore['Estado']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($borradore['Borradore']['nombre']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descripcion'); ?></dt>
		<dd>
			<?php echo h($borradore['Borradore']['descripcion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Flag'); ?></dt>
		<dd>
			<?php echo h($borradore['Borradore']['flag']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Borradore'), array('action' => 'edit', $borradore['Borradore']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Borradore'), array('action' => 'delete', $borradore['Borradore']['id']), array(), __('Are you sure you want to delete # %s?', $borradore['Borradore']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Borradores'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Borradore'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Formulas'), array('controller' => 'formulas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Formula'), array('controller' => 'formulas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Estados'), array('controller' => 'estados', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Estado'), array('controller' => 'estados', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Insumos'), array('controller' => 'insumos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Insumo'), array('controller' => 'insumos', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Insumos'); ?></h3>
	<?php if (!empty($borradore['Insumo'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Estado Id'); ?></th>
		<th><?php echo __('Nombre'); ?></th>
		<th><?php echo __('Stock'); ?></th>
		<th><?php echo __('Minimo'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($borradore['Insumo'] as $insumo): ?>
		<tr>
			<td><?php echo $insumo['id']; ?></td>
			<td><?php echo $insumo['estado_id']; ?></td>
			<td><?php echo $insumo['nombre']; ?></td>
			<td><?php echo $insumo['stock']; ?></td>
			<td><?php echo $insumo['minimo']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'insumos', 'action' => 'view', $insumo['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'insumos', 'action' => 'edit', $insumo['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'insumos', 'action' => 'delete', $insumo['id']), array(), __('Are you sure you want to delete # %s?', $insumo['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Insumo'), array('controller' => 'insumos', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
