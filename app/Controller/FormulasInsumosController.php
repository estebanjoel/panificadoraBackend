<?php
App::uses('AppController', 'Controller');
/**
 * FormulasInsumos Controller
 *
 * @property FormulasInsumo $FormulasInsumo
 * @property PaginatorComponent $Paginator
 */
class FormulasInsumosController extends AppController {

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
		$this->FormulasInsumo->recursive = 0;
		$this->set('formulasInsumos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->FormulasInsumo->exists($id)) {
			throw new NotFoundException(__('Invalid formulas insumo'));
		}
		$options = array('conditions' => array('FormulasInsumo.' . $this->FormulasInsumo->primaryKey => $id));
		$this->set('formulasInsumo', $this->FormulasInsumo->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->FormulasInsumo->create();
			if ($this->FormulasInsumo->save($this->request->data)) {
				$this->Session->setFlash(__('The formulas insumo has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The formulas insumo could not be saved. Please, try again.'));
			}
		}
		$formulas = $this->FormulasInsumo->Formula->find('list');
		$insumos = $this->FormulasInsumo->Insumo->find('list');
		$this->set(compact('formulas', 'insumos'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->FormulasInsumo->exists($id)) {
			throw new NotFoundException(__('Invalid formulas insumo'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->FormulasInsumo->save($this->request->data)) {
				$this->Session->setFlash(__('The formulas insumo has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The formulas insumo could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('FormulasInsumo.' . $this->FormulasInsumo->primaryKey => $id));
			$this->request->data = $this->FormulasInsumo->find('first', $options);
		}
		$formulas = $this->FormulasInsumo->Formula->find('list');
		$insumos = $this->FormulasInsumo->Insumo->find('list');
		$this->set(compact('formulas', 'insumos'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->FormulasInsumo->id = $id;
		if (!$this->FormulasInsumo->exists()) {
			throw new NotFoundException(__('Invalid formulas insumo'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->FormulasInsumo->delete()) {
			$this->Session->setFlash(__('The formulas insumo has been deleted.'));
		} else {
			$this->Session->setFlash(__('The formulas insumo could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
