<?php

	echo $this->Html->script(array('searchUser'));
	echo $this->fetch('script');

 ?>
<?php if($ajax !=1): ?>
<div class="container">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">Buscar Usuario</h3>
		</div>
		<div class="panel-body">
	<div class="row">
		<?php echo $this->Form->create('User', array('type'=>'GET'),array('class'=>'form-inline')); ?>
		<div class="col-sm-11 col-xs-10">
			<?php echo $this->Form->input('search',array('label'=>false, 'div'=>false, 'class'=>'form-control','autocomplete'=>'off','value'=>$search)); ?>
		</div>
		<div class="col-sm-1 col-xs-2">
			<?php echo $this->Form->button('',array('div'=>false, 'class'=>'btn btn-primary glyphicon glyphicon-search')); ?>
		</div>
		<?php echo $this->Form->end(); ?>
	</div> <br>
<?php endif ?>

<?php if(!empty($search)): ?>

	<?php if(!empty($users)): ?>
		
		<div class="alert alert-info text-center">Se ha encontrado mas de un resultado. Seleccione la opcion que buscaba:</div>
		<table class="table table-bordered table-hover">
			<thead>
			<tr>
				<th><?php echo ('id'); ?></th>
				<th><?php echo ('username'); ?></th>
				<th><?php echo __('Detalle'); ?></th>
			</tr>
			<tbody>
			<?php foreach($users as $user): ?>
				<td><?php echo h($user['User']['id']); ?>&nbsp;</td>
				<td ><?php echo h($user['User']['username']); ?>&nbsp;</td>
				<td>
					<div class="btn-group">
						<?php echo $this->Html->link(__(''), array('action' => 'view', $user['User']['id']), array('class'=>'btn btn-primary glyphicon glyphicon-search', 'title'=>'Ver Detalle de Usuario')); ?>
					</div>
				</td>
			</tr>
			</tbody>
		<?php endforeach; ?>
		</table>
		<br><br><br>
	</div>

	<?php endif; ?>
	<?php else: ?>
		</div>
	</div>

<?php endif ?>
</div>
</div>
	<div class="center-block"><?php echo $this->Html->link(__('Volver'), array('action' => 'index'), array('type'=>'button','class'=>'btn btn-primary')); ?></div>
</div>