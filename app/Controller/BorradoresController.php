<?php
App::uses('AppController', 'Controller');
/**
 * Borradores Controller
 *
 * @property Borradore $Borradore
 * @property PaginatorComponent $Paginator
 */
class BorradoresController extends AppController {

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
		$this->Borradore->recursive = 0;
		$this->set('borradores', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Borradore->exists($id)) {
			throw new NotFoundException(__('Invalid borradore'));
		}
		$options = array('conditions' => array('Borradore.' . $this->Borradore->primaryKey => $id));
		$this->set('borradore', $this->Borradore->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Borradore->create();
			if ($this->Borradore->save($this->request->data)) {
				$this->Session->setFlash(__('The borradore has been saved.'));
				//return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The borradore could not be saved. Please, try again.'));
			}
		}
		$formulas = $this->Borradore->Formula->find('list');
		$estados = $this->Borradore->Estado->find('list');
		$insumos = $this->Borradore->Insumo->find('list');
		$this->set(compact('formulas', 'estados', 'insumos'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Borradore->exists($id)) {
			throw new NotFoundException(__('Invalid borradore'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Borradore->save($this->request->data)) {
				$this->Session->setFlash(__('The borradore has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The borradore could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Borradore.' . $this->Borradore->primaryKey => $id));
			$this->request->data = $this->Borradore->find('first', $options);
		}
		$formulas = $this->Borradore->Formula->find('list');
		$estados = $this->Borradore->Estado->find('list');
		$insumos = $this->Borradore->Insumo->find('list');
		$this->set(compact('formulas', 'estados', 'insumos'));
	}



	public function add_modified() {
		if ($this->request->is('post')) {
			$this->Borradore->create();
			if ($this->Borradore->save($this->request->data)) {
				
				return $this->redirect(array('action' => 'index'));
			} 
		}
		$formulas = $this->Borradore->Formula->find('list');
		$estados = $this->Borradore->Estado->find('list');
		$insumos = $this->Borradore->Insumo->find('list');
		$this->set(compact('formulas', 'estados', 'insumos'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Borradore->id = $id;
		if (!$this->Borradore->exists()) {
			throw new NotFoundException(__('Invalid borradore'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Borradore->delete()) {
			$this->Session->setFlash(__('The borradore has been deleted.'));
		} else {
			$this->Session->setFlash(__('The borradore could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}


public function prueba()
	{ debug('$dato');}