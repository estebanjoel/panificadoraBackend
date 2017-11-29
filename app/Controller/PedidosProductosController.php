<?php
App::uses('AppController', 'Controller');

/**
 * PedidosProductos Controller
 *
 * @property PedidosProducto $PedidosProducto
 * @property PaginatorComponent $Paginator
 */
class PedidosProductosController extends AppController {

/**
 * Components
 *
 * @var array
 */

	public $components = array('RequestHandler','Session');
	public $helpers = array('Html','Form','Time','Js');
	public $paginate = array(

		'fields'=>array(
			'PedidosProducto.id',
			'Pedidos.subestado_id',
			'PedidosProducto.producto_id',
			'Sum(PedidosProducto.cantidad) AS total',
			'Productos.nombre',
			'Pedidos.fecha',
			'PedidosProducto.subestado_id'
			),

		'group'=>array('PedidosProducto.producto_id'),
		'joins'=>array(

			array(
					'table'=>'pedidos',
					'type'=>'left',
					'fields'=>'pedidos.subestado_id','pedidos.fecha',
					'conditions'=>array('PedidosProducto.pedido_id = pedidos.id')
					),
				

			array(
					'table'=>'productos',
					'type'=>'left',
					'fields'=>'productos.nombre',
					'conditions'=>array('PedidosProducto.producto_id=productos.id')
					),
				),

		'conditions'=>array(/*'pedidos.fecha=CURRENT_DATE-1',*/'PedidosProducto.subestado_id=1','PedidosProducto.subestado_id=pedidos.subestado_id'),

		);


/**
 * index method
 *
 * @return void
 */
	public function index() {

		$this->paginate['pedidosProductos']['limit']=5;
		$this->set('pedidosProductos', $this->paginate());

	}

	public function enProceso(){

		$pedidosProduccion=$this->PedidosProducto->find('all',array(

		'fields'=>array(
			'PedidosProducto.id',
			'Pedidos.subestado_id',
			'PedidosProducto.producto_id',
			'PedidosProducto.subestado_id',
			'Sum(PedidosProducto.cantidad) AS total',
			'Productos.nombre',
			'Pedidos.fecha',
			),

		'group'=>array('PedidosProducto.producto_id'),
		'joins'=>array(

			array(
					'table'=>'pedidos',
					'type'=>'left',
					'fields'=>'pedidos.subestado_id','pedidos.fecha',
					'conditions'=>array('PedidosProducto.pedido_id = pedidos.id')
					),
				

			array(
					'table'=>'productos',
					'type'=>'left',
					'fields'=>'productos.nombre',
					'conditions'=>array('PedidosProducto.producto_id=productos.id')
					),
				),

		'conditions'=>array(/*'pedidos.fecha=CURRENT_DATE-1', */'PedidosProducto.subestado_id=2'),

		));

		$this->set('pedidosProductos', $pedidosProduccion);
	}

	public function realizados(){

		$pedidosProduccion=$this->PedidosProducto->find('all',array(

		'fields'=>array(
			'PedidosProducto.id',
			'Pedidos.subestado_id',
			'PedidosProducto.producto_id',
			'Sum(PedidosProducto.cantidad) AS total',
			'Productos.nombre',
			'Pedidos.fecha',
			'Pedidos.subestado_id'
			),

		'group'=>array('PedidosProducto.producto_id'),
		'joins'=>array(

			array(
					'table'=>'pedidos',
					'type'=>'left',
					'fields'=>'pedidos.subestado_id','pedidos.fecha',
					'conditions'=>array('PedidosProducto.pedido_id = pedidos.id')
					),
				

			array(
					'table'=>'productos',
					'type'=>'left',
					'fields'=>'productos.nombre',
					'conditions'=>array('PedidosProducto.producto_id=productos.id')
					),
				),

		'conditions'=>array(/*'pedidos.fecha=CURRENT_DATE-1', */'PedidosProducto.subestado_id=3'),

		));

		$this->set('pedidosProductos', $pedidosProduccion);
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->PedidosProducto->exists($id)) {
			throw new NotFoundException(__('Invalid pedidos producto'));
		}
		$options = array('conditions' => array('PedidosProducto.' . $this->PedidosProducto->primaryKey => $id));
		$this->set('pedidosProducto', $this->PedidosProducto->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->PedidosProducto->create();
			if ($this->PedidosProducto->save($this->request->data)) {
				$this->Session->setFlash(__('The pedidos producto has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The pedidos producto could not be saved. Please, try again.'));
			}
		}
		$pedidos = $this->PedidosProducto->Pedido->find('list');
		$productos = $this->PedidosProducto->Producto->find('list');
		$this->set(compact('pedidos', 'productos'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {

		$pedidosProduccion=$this->PedidosProducto->find('all',array(

		'fields'=>array(
			'PedidosProducto.id',
			'Pedidos.subestado_id',
			'PedidosProducto.producto_id',
			'Sum(PedidosProducto.cantidad) AS total',
			'Productos.nombre',
			'Pedidos.fecha',
			'Pedidos.subestado_id'
			),

		'group'=>array('PedidosProducto.producto_id'),
		'joins'=>array(

			array(
					'table'=>'pedidos',
					'type'=>'left',
					'fields'=>'pedidos.subestado_id','pedidos.fecha',
					'conditions'=>array('PedidosProducto.pedido_id = pedidos.id')
					),
				

			array(
					'table'=>'productos',
					'type'=>'left',
					'fields'=>'productos.nombre',
					'conditions'=>array('PedidosProducto.producto_id=productos.id')
					),
				),

		'conditions'=>array(/*'pedidos.fecha=CURRENT_DATE-1', */),

		));

		$flag=0;
		for ($pedido=0; $pedido<sizeof($pedidosProduccion);$pedido++){

			if ($pedidosProduccion[$pedido]['PedidosProducto']['producto_id']==$id){
				$flag++;
				break;
			}
		}

		if ($flag==0){
			throw new NotFoundException(__('Producto Invalido'));
		}
		
		if ($this->request->is(array('post', 'put'))) {
				
				$cambio=$this->request->data;
				$flag2=0;
				$pedidosProductos=$this->PedidosProducto->find('all');
				for ($indice=0; $indice<sizeof($pedidosProductos);$indice++){

					if ($pedidosProductos[$indice]['Producto']['id']==$id){

						$flag2=1;
						$this->PedidosProducto->updateAll(array('PedidosProducto.subestado_id'=>"'".$cambio['PedidosProducto']['subestado_id']."'"),array('PedidosProducto.producto_id'=>$id));
					}
				}

				$listadoPedidos=[];
				$pedidosProductosCambiados=$this->PedidosProducto->find('all',array('conditions'=>array('PedidosProducto.producto_id'=>$id)));
				for ($indice=0;$indice<sizeof($pedidosProductosCambiados);$indice++){

					array_push($listadoPedidos,$this->PedidosProducto->find('all',array('conditions'=>(array('PedidosProducto.pedido_id'=>$pedidosProductosCambiados[$indice]['PedidosProducto']['pedido_id'])))));
				

				}


				for ($lista=0;$lista<sizeof($listadoPedidos);$lista++){

						$subestado=$listadoPedidos[$lista][0]['PedidosProducto']['subestado_id'];
						$flagLista=0;
					for ($producto=0;$producto<sizeof($listadoPedidos[$lista]);$producto++){

						
						if($listadoPedidos[$lista][$producto]['PedidosProducto']['subestado_id']!=$subestado){

						 	$flagLista++;
						 	break;

						}

					}

					if($flagLista==0){

							$this->PedidosProducto->updateAll(array('Pedido.subestado_id'=>"'".$cambio['PedidosProducto']['subestado_id']."'"),array('PedidosProducto.pedido_id'=>$listadoPedidos[$lista][0]['PedidosProducto']['pedido_id']));
						}
				}

			/*if ($flag2==1){

					$this->Session->setFlash('El Estado de Pedido de Produccion ha sido cambiado correctamente', 'default',array('class'=>'container alert alert-success text-center'));
					}

				else{

					$this->Session->setFlash('El Estado de Pedido de Produccion no pudo modificarse, intentelo nuevamente', 'default',array('class'=>'container alert alert-danger text-center'));
				}

				return $this->redirect(array('action' => 'index'));*/

			
		/*	
		} else {
			$options = array('conditions' => array('PedidosProducto.' . $this->PedidosProducto->primaryKey => $id));
			$this->request->data = $this->PedidosProducto->find('first', $options);*/
		}

		$subestados = $this->PedidosProducto->Subestado->find('list');
		$this->set(compact('subestados'));
	}
		

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->PedidosProducto->id = $id;
		if (!$this->PedidosProducto->exists()) {
			throw new NotFoundException(__('Invalid pedidos producto'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->PedidosProducto->delete()) {
			$this->Session->setFlash(__('The pedidos producto has been deleted.'));
		} else {
			$this->Session->setFlash(__('The pedidos producto could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function isAuthorized($user)
        { if(isset($user['Role']) && $user['Role']['tipo']==='Empleado de Produccion')
            {if(in_array($this->action, array('index','enProceso','realizados','add','edit','view','delete','search','searchJson')))
            	{return true;}
            else
            	{if($this->Auth->user('id'))
            		{$this->Session->setFlash('No tiene acceso','default', array('class'=>'alert alert-danger'));
            		$this->redirect($this->Auth->redirect());


            		}

        }

        }
        return parent::isAuthorized($user);
           
    }

}
