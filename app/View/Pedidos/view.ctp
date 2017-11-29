<div class="container">
	<div class="panel panel-primary">
		<div class="panel-heading">
	   		<h3 class="panel-title"><?php echo __('Detalle de Pedido de Cliente #'),h($pedido['Pedido']['id']); ?></h3>
		</div>	
		<div class="panel-body">
			<ul class="list-group">
				<li class="list-group-item">

					<h4><?php echo __('Id'); ?></h4>
					<p>
						<?php echo h($pedido['Pedido']['id']); ?>
						&nbsp;
					</p></li>
					<li class="list-group-item"><h4><?php echo __('Estado'); ?></h4>
					<p>
						<?php echo $this->Html->link($pedido['Estado']['nombre'], array('controller' => 'estados', 'action' => 'view', $pedido['Estado']['id'])); ?>
						&nbsp;
					</p></li>
					<li class="list-group-item"><h4><?php echo __('Subestado'); ?></h4>
					<p>
						<?php echo $this->Html->link($pedido['Subestado']['nombre'], array('controller' => 'subestados', 'action' => 'view', $pedido['Subestado']['id'])); ?>
						&nbsp;
					</p></li>
					<li class="list-group-item"><h4><?php echo __('Cliente'); ?></h4>
					<p>
						<?php echo $this->Html->link($pedido['Cliente']['dni'], array('controller' => 'clientes', 'action' => 'view', $pedido['Cliente']['id'])); ?>
						&nbsp;
					</p></li>
				</ul>
			</div>

			<div class="panel-footer">
				<div class="panel panel-primary">
					<div class="panel-heading"><h3 class="panel-title"><?php echo __('Productos'); ?></h3>
					</div>
						<div class="panel-body">
						<?php if (!empty($pedido['Producto'])): ?>
							<table class="table table-bordered">
						<tr>
							<th><?php echo __('Nombre'); ?></th>
							<th><?php echo __('Detalle'); ?></th>
							<th class="actions"><?php echo __('Actions'); ?></th>
						</tr>
						<?php foreach ($pedido['Producto'] as $producto): ?>
							<tr>

								<td><?php echo $producto['nombre']; ?></td>
								<td><?php echo $producto['detalle']; ?></td>
								<td class="actions">
									<?php echo $this->Html->link(__('View'), array('controller' => 'productos', 'action' => 'view', $producto['id'])); ?>
								</td>
							</tr>
					<?php endforeach; ?>
			</table>
			<?php endif; ?>
			</div>
		</div>
	</div>
</div>
	<div class="center-block"><?php echo $this->Html->link(__('Atras'), array('action' => 'index'), array('type'=>'button','class'=>'btn btn-primary')); ?></div>
</div>
