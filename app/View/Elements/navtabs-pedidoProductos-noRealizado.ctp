<ul class="nav nav-pills">
  <li role="presentation"  class="active"><?php echo $this->Html->link('Pedidos no Realizados',array('controller'=>'pedidosProductos','action'=>'index')); ?></li>
  <li role="presentation" ><?php echo $this->Html->link('Pedidos en Proceso',array('controller'=>'pedidosProductos','action'=>'enProceso')); ?></li>
  <li role="presentation"><?php echo $this->Html->link('Pedidos Realizados',array('controller'=>'pedidosProductos','action'=>'realizados')); ?></li>
 
</ul>
<br>