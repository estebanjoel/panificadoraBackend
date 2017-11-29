<?php
App::uses('AppController', 'Controller');
/**
 * Pedidos Controller
 *
 * @property Pedido $Pedido
 * @property PaginatorComponent $Paginator
 */
class PedidosController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('RequestHandler','Session');
	public $helpers = array('Html','Form','Time','Js');

	public $paginate = array(
		'limit'=>5,
		'order'=>array(
			'Pedido.id'=>'asc'));

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Pedido->recursive = 0;
		$this->paginate['Pedido']['limit']=5;
		$this->paginate['Pedido']['order']=array('Pedido.id'=>'asc');
		$this->set('pedidos', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Pedido->exists($id)) {
			throw new NotFoundException(__('Invalid pedido'));
		}
		$options = array('conditions' => array('Pedido.' . $this->Pedido->primaryKey => $id));
		$this->set('pedido', $this->Pedido->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Pedido->create();
			debug($this->request->data);
			if ($this->Pedido->save($this->request->data)) {
				return $this->redirect(array('action' => 'add_cantidad'));
			}
		}
		$estados = $this->Pedido->Estado->find('list');
		$subestados = $this->Pedido->Subestado->find('list');
		$clientes = $this->Pedido->Cliente->find('list',array('fields'=>array('id','nombre_completo')));
		$productos = $this->Pedido->Producto->find('list');
		$this->set(compact('estados', 'subestados', 'clientes', 'productos'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Pedido->exists($id)) {
			throw new NotFoundException(__('Invalid pedido'));
		}

		$pedido=$this->Pedido->find('first',array('conditions'=>array('Pedido.id'=>$id)));
		if($pedido['Pedido']['subestado_id']!=1){

			$this->Session->setFlash('El Pedido no se puede modificar.','default',array('class'=>'container alert alert-danger text-center'));
			return $this->redirect(array('action' => 'index'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Pedido->save($this->request->data)) {
				return $this->redirect(array('action' => 'edit_cantidad',$this->Pedido->id));
			} else {
			}
		} else {
			$options = array('conditions' => array('Pedido.' . $this->Pedido->primaryKey => $id));
			$this->request->data = $this->Pedido->find('first', $options);
		}
		$estados = $this->Pedido->Estado->find('list');
		$subestados = $this->Pedido->Subestado->find('list');
		$clientes = $this->Pedido->Cliente->find('list');
		$productos = $this->Pedido->Producto->find('list');
		$this->set(compact('estados', 'subestados', 'clientes', 'productos'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Pedido->id = $id;
		if (!$this->Pedido->exists()) {
			throw new NotFoundException(__('Invalid pedido'));
		}

		$pedido=$this->Pedido->find('first',array('conditions'=>array('Pedido.id'=>$id)));
		if($pedido['Pedido']['subestado_id']!=1){

			$this->Session->setFlash('El Pedido no se puede eliminar.','default',array('class'=>'container alert alert-danger text-center'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Pedido->delete()) {
			$this->Session->setFlash(__('The pedido has been deleted.'));
		} else {
			$this->Session->setFlash(__('The pedido could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function add_cantidad(){

   		$pedido=$this->Pedido->find('first',array('order' => array('Pedido.id' => 'DESC')));
   		$productos=$this->Pedido->PedidosProducto->find('all',array('conditions'=>array('PedidosProducto.pedido_id'=>$pedido['Pedido']['id'])));


   		$cantidades=$this->request->data;
   		$i=0;
   		foreach ($cantidades['datos'] as $cantidad){

   			$this->Pedido->PedidosProducto->updateAll(array('PedidosProducto.cantidad'=>"'".$cantidad."'"), array('PedidosProducto.producto_id'=>$productos[$i]['PedidosProducto']['producto_id'],'PedidosProducto.pedido_id'=>$pedido['Pedido']['id'],'PedidosProducto.id'=>$productos[$i]['PedidosProducto']['id']));
   			$i++;

   		}
   		
   		if($i!=0){

   			$this->Session->setFlash('El Pedido ha sido creado correctamente', 'default',array('class'=>'container alert alert-success text-center'));
   			return $this->redirect(array('action' => 'index'));
   		}
   		else{
   			$this->Session->setFlash('El Pedido no pudo crearse, intentelo nuevamente', 'default',array('class'=>'container alert alert-danger text-center'));
   		}

   		$this->set('productos',$productos);
   		$this->set('pedido',$pedido);

   	}

   		public function edit_cantidad($id=null){

   		$this->Pedido->id = $id;
		if (!$this->Pedido->exists()) {
			throw new NotFoundException(__('Invalid Pedido'));
		}
		else{
	   		$pedido=$this->Pedido->find('first',array('conditions'=>(array('Pedido.id'=>$id))));
	   		$productos=$this->Pedido->PedidosProducto->find('all',array('conditions'=>array('PedidosProducto.pedido_id'=>$pedido['Pedido']['id'])));

	   		$cantidades=$this->request->data;
	   		$i=0;
	   		foreach ($cantidades['datos'] as $cantidad){

	   			$this->Pedido->PedidosProducto->updateAll(array('PedidosProducto.cantidad'=>"'".$cantidad."'"), array('PedidosProducto.producto_id'=>$productos[$i]['PedidosProducto']['producto_id'],'PedidosProducto.pedido_id'=>$pedido['Pedido']['id'],'PedidosProducto.id'=>$productos[$i]['PedidosProducto']['id']));
	   			$i++;

	   		}
	   		
	   		if($i!=0){

	   			$this->Session->setFlash('El Pedido ha sido modificado correctamente', 'default',array('class'=>'container alert alert-success text-center'));
	   			return $this->redirect(array('action' => 'index'));
	   		}
	   		else{
	   			$this->Session->setFlash('El Pedido no pudo modificarse, intentelo nuevamente', 'default',array('class'=>'container alert alert-danger text-center'));
	   		}
			
			$this->set('productos',$productos);
	   		$this->set('pedido',$pedido);
	   	}

   	}

	public function isAuthorized($user)
        { if(isset($user['Role']) && $user['Role']['tipo']==='Empleado de Ventas')
            {if(in_array($this->action, array('index','add','edit','view','delete','add_cantidad','edit_cantidad')))
            	{return true;}
            else
            	{if($this->Auth->user('id'))
            		{$this->Session->setFlash('No tiene acceso','default', array('class'=>'alert alert-danger'));
            		$this->redirect($this->Auth->redirect());


            		}

        }

        }

        if(isset($user['Role']) && $user['Role']['tipo']==='Gerente de Produccion')
            {if(in_array($this->action, array('index')))
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
