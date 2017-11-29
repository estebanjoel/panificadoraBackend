<div class="header">
<div class="container">
<?php echo $this->Html->css(array('mio')); ?>

<div id="header">
       
			<nav class="navbar navbar-inverse navbar-fixed-top navFondo" class="img-responsive">
 			<div class="container-fluid">
    	<div class="navbar-header">
          
          <a class="navbar-brand" href="#">Panificados del Sur</a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          </button>
      </div>

     	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      			<ul class="nav navbar-nav">
        			<li><?php   echo $this->Html->link('Home',array('controller'=>'','action'=>'index'));?></li>
        			
              <?php  if(($current_user['Role']['tipo'])=='Super Administrador' or ($current_user['Role']['tipo'])=='Administrador'): ?>
              <li><?php   echo $this->Html->link('Usuarios',array('controller'=>'users','action'=>'index'));?></li>
              <?php endif;?>

                <?php  if(($current_user['Role']['tipo'])=='Super Administrador' or ($current_user['Role']['tipo'])=='Empleado de Ventas'): ?>
                <li><?php   echo $this->Html->link('Clientes',array('controller'=>'Clientes','action'=>'index'));?></li>
        				<?php  endif; ?>
                
            			
                   <?php  if(($current_user['Role']['tipo'])=='Super Administrador' or ($current_user['Role']['tipo'])=='Empleado de Ventas' or ($current_user['Role']['tipo'])=='Gerente de Produccion'): ?> 
                  <li><?php   echo $this->Html->link('Pedidos de Clientes',array('controller'=>'Pedidos','action'=>'index'));?></li>
            		    <?php  endif; ?> 

                    <?php  if(($current_user['Role']['tipo'])=='Super Administrador' or ($current_user['Role']['tipo'])=='Empleado de Produccion'): ?> 
                   	<li><?php   echo $this->Html->link('Pedidos de Produccion',array('controller'=>'PedidosProductos','action'=>'index'));?></li>
          			     <?php  endif; ?> 

               <?php  if(($current_user['Role']['tipo'])=='Super Administrador' or ($current_user['Role']['tipo'])=='Encargado de Produccion'): ?>              
        			<li><?php   echo $this->Html->link('Productos',array('controller'=>'Productos','action'=>'index'));?></li>
        			 <?php  endif; ?> 


               <?php  if(($current_user['Role']['tipo'])=='Super Administrador' or ($current_user['Role']['tipo'])=='Encargado de Produccion'): ?>
              <li><?php   echo $this->Html->link('Insumos',array('controller'=>'Insumos','action'=>'index'));?></li>
               <?php  endif; ?>

                
               <?php  if(($current_user['Role']['tipo'])=='Gerente de Produccion'): ?>
              <li><?php   echo $this->Html->link('Insumos',array('controller'=>'Insumos','action'=>'minimo'));?></li>
               <?php  endif; ?>
              
               <?php  if(($current_user['Role']['tipo'])=='Super Administrador'or ($current_user['Role']['tipo'])=='Encargado de Produccion'): ?>
              <li><?php   echo $this->Html->link('Formulas',array('controller'=>'Formulas','action'=>'index'));?></li>
      				 <?php  endif ?>

               <?php  if(($current_user['Role']['tipo'])=='Super Administrador'or ($current_user['Role']['tipo'])=='Gerente de Produccion'): ?>
              <li><?php   echo $this->Html->link('Cambio de Formula',array('controller'=>'Formulas','action'=>'aprobar_formula'));?></li>
               <?php  endif ?>

              </ul>
      			<ul class="nav navbar-nav navbar-right">
              <li>
                <?php echo $this->Html->link('Salir', array('controller' => 'users', 'action' => 'logout')); ?>              


              </li>
            </ul>    
    		</div>
			</div>
		</nav>
	</div>

</div>
</div>