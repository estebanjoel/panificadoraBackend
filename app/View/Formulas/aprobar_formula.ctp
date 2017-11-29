<div class="container">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title"><?php echo ('Formulas Pendientes a Aprobacion'); ?></h3>
  		</div>
	<div class="panel-body">
		<?php if($cantidad_nueva=='' && $formula_nueva==''):?>
			<div class="alert alert-info text-center">No hay Pedidos de Cambio de Formulas</div>
		
		<?php else: ?>

		<h3><?php echo('Formula #'),h($formula[0]['Formula']['id']);?></h3>

		<table class="table table-hover table-bordered">
			<thead>
			<tr>
			<td>Nombre</td>
			<td>Descripcion</td>
			</tr>
			</thead>
			<tbody>
				<td><?php echo($formula[0]['Formula']['nombre']);?></td>
				<td><?php echo($formula[0]['Formula']['descripcion']);?></td>
			</tbody>
			</table>

			<div class="panel panel-primary">	
		<div class="panel-heading">
			<h3 class="panel-title"><?php echo ('Insumos'); ?></h3>
  		</div>
  			<div class="panel-body">
  				<table class="table table-hover table-bordered">
			<thead>
			<tr>

				<td>Id</td>
				<td>Cantidad</td>
			</tr>
			</thead>
			<?php foreach ($insumos as $insumo):?>
			<tbody>
				<td><?php echo($insumo['FormulasInsumo']['insumo_id']); ?></td>
				<td><?php echo($insumo['FormulasInsumo']['cantidad']);?></td>
			</tbody>
			<?php endforeach;?>
			
		</table>
  			</div>
  		</div>
		
	</div>
	<div class="alert alert-warning text-center">¿Desea aprobar la modificacion de esta Formula?</div>
	<div class="center-block">
		<?php echo $this->Html->link(__('Si'), array('controller' =>'formulas', 'action' => 'aprobar_formula', 1), array('class'=>'btn btn-primary')); ?></td>
		<?php echo $this->Html->link(__('No'), array('controller' =>'formulas', 'action' => 'aprobar_formula', 2), array('class'=>'btn btn-danger')); ?></td>
	</div>
<?php endif; ?>
	</div>


</div>