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
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->PedidosProducto->recursive = 0;
		$this->set('pedidosProductos', $this->Paginator->paginate());
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
		if (!$this->PedidosProducto->exists($id)) {
			throw new NotFoundException(__('Invalid pedidos producto'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->PedidosProducto->save($this->request->data)) {
				$this->Session->setFlash(__('The pedidos producto has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The pedidos producto could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('PedidosProducto.' . $this->PedidosProducto->primaryKey => $id));
			$this->request->data = $this->PedidosProducto->find('first', $options);
		}
		$pedidos = $this->PedidosProducto->Pedido->find('list');
		$productos = $this->PedidosProducto->Producto->find('list');
		$this->set(compact('pedidos', 'productos'));
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
}
