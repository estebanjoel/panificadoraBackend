<div class="container">
	<div class="panel panel-primary">
		<div class="panel-heading">
	   		<h3 class="panel-title"><?php echo __('Detalle de Producto #'),h($producto['Producto']['id']); ?></h3>
		</div>	
		<div class="panel-body">
			<ul class="list-group">
				<li class="list-group-item">
					<h4><?php echo __('Estado'); ?></h4>
					<p><?php echo $this->Html->link($producto['Estado']['nombre'], array('controller' => 'estados', 'action' => 'view', $producto['Estado']['id'])); ?>&nbsp;</p>
				</li>
				<li class="list-group-item">
					<h4><?php echo __('Formula'); ?></h4>
					<p><?php echo $this->Html->link($producto['Formula']['estado_id'], array('controller' => 'formulas', 'action' => 'view', $producto['Formula']['id'])); ?>&nbsp;</p>
				</li>
				<li class="list-group-item">
					<h4><?php echo __('Nombre'); ?></h4>
					<p><?php echo h($producto['Producto']['nombre']); ?>&nbsp;</p>
				</li>
				<li class="list-group-item">
					<h4><?php echo __('Detalle'); ?></h4>
					<p><?php echo h($producto['Producto']['detalle']); ?>&nbsp;</p>
				</li>
			</ul>
		</div>
		<div class="panel-footer">
			<div class="panel panel-primary">
				<div class="panel-heading"><h3 class="panel-title"><?php echo __('Pedidos de Cliente'); ?></h3>
				</div>
				<div class="panel-body">
					<?php if (!empty($producto['Cpedido'])): ?>
					<div class="table-responsive">
						<table class="table table-bordered">
						<tr>
							<th><?php echo __('Id'); ?></th>
							<th><?php echo __('Fecha'); ?></th>
						</tr>
						<?php foreach ($producto['Pedido'] as $pedido): ?>
							<tr>
								<td><?php echo $pedido['id']; ?></td>
								<td><?php echo $pedido['fecha']; ?></td>
							</tr>
						<?php endforeach; ?>
						</table>
					</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>

	<div class="center-block"><?php echo $this->Html->link(__('Atras'), array('action' => 'index'), array('type'=>'button','class'=>'btn btn-primary')); ?></div>
</div>
