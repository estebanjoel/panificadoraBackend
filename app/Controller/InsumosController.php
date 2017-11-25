<?php
App::uses('AppController', 'Controller');
/**
 * Insumos Controller
 *
 * @property Insumo $Insumo
 * @property PaginatorComponent $Paginator
 */
class InsumosController extends AppController {

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
			'Insumo.id'=>'asc'));


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Insumo->recursive = 0;
		$this->paginate['Insumo']['limit']=5;
		$this->paginate['Insumo']['order']=array('Insumo.id'=>'asc');
		$this->paginate['Insumo']['conditions']=array('Insumo.estado_id' => 1);
		$this->set('insumos', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Insumo->exists($id)) {
			throw new NotFoundException(__('Invalid insumo'));
		}
		$options = array('conditions' => array('Insumo.' . $this->Insumo->primaryKey => $id));
		$this->set('insumo', $this->Insumo->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Insumo->create();
			if ($this->Insumo->save($this->request->data)) {
				$this->Session->setFlash('El Insumo ha sido creado correctamente', 'default',array('class'=>'container alert alert-success text-center'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('El Insumo no pudo crearse, intentelo nuevamente', 'default',array('class'=>'container alert alert-danger text-center'));
			}
		}
		$estados = $this->Insumo->Estado->find('list');
		$formulas = $this->Insumo->Formula->find('list');
		$this->set(compact('estados', 'formulas'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Insumo->exists($id)) {
			throw new NotFoundException(__('Invalid insumo'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Insumo->save($this->request->data)) {
				$this->Session->setFlash('El Insumo ha sido modificado correctamente', 'default',array('class'=>'container alert alert-success text-center'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('El Insumo no pudo modificarse, intentelo nuevamente', 'default',array('class'=>'container alert alert-danger text-center'));
			}
		} else {
			$options = array('conditions' => array('Insumo.' . $this->Insumo->primaryKey => $id));
			$this->request->data = $this->Insumo->find('first', $options);
		}
		$estados = $this->Insumo->Estado->find('list');
		$formulas = $this->Insumo->Formula->find('list');
		$this->set(compact('estados', 'formulas'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		
		$this->Insumo->id = $id;
		if (!$this->Insumo->exists()) {
			throw new NotFoundException(__('Invalid producto'));
		}
   		
		$this->request->allowMethod('post', 'delete');
   		if ($this->Insumo->saveField('estado_id', 2)){

   			$this->Session->setFlash('El Insumo ha sido eliminado correctamente', 'default',array('class'=>'container alert alert-success text-center'));
		} 

		else {
			$this->Session->setFlash('El Insumo no pudo eliminarse, intentelo nuevamente', 'default',array('class'=>'container alert alert-danger text-center'));
		}
		return $this->redirect(array('action' => 'index'));

   	}


	public function minimo() {
		$this->Insumo->recursive = 0;
		$this->paginate['Insumo']['limit']=5;
		$this->paginate['Insumo']['order']=array('Insumo.id'=>'asc');
		$this->paginate['Insumo']['conditions'] = array('Insumo.minimo >'=> 'Insumo.stock');
		$this->set('insumos', $this->paginate());
	}

	public function add_stock($id = null){

		$this->Insumo->id = $id;
		if (!$this->Insumo->exists()) {
			throw new NotFoundException(__('Invalid Insumo'));
		}

		if ($this->request->is(array('post', 'put'))) {
			if ($this->Insumo->save($this->request->data)) {
				$this->Session->setFlash('El Insumo ha sido modificado correctamente', 'default',array('class'=>'container alert alert-success text-center'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('El Insumo no pudo modificarse, intentelo nuevamente', 'default',array('class'=>'container alert alert-danger text-center'));
			}
		} else {
			$options = array('conditions' => array('Insumo.' . $this->Insumo->primaryKey => $id));
			$this->request->data = $this->Insumo->find('first', $options);
		}
	}

	public function searchJson(){

		$term = null;
		if(!empty($this->request->query['term'])){

			$term = $this->request->query['term'];
			$terms = explode(' ',trim($term));
			$terms = array_diff($terms, array(''));
			foreach ($terms as $term){
				
				$conditions[]=array('Insumo.nombre LIKE' => '%' . $term . '%');
			}

			$insumos = $this->Insumo->find('all',array('recursive' => -1, 'fields' => array('Insumo.id','Insumo.nombre'), 'conditions' => $conditions, 'limit' => 20));

		}

		echo json_encode($insumos);
		$this->autoRender = false;
	}

	public function search(){

		$search=null;
		if(!empty($this->request->query['search'])){

			$search=$this->request->query['search'];
			$search=preg_replace('/[^a-zA-ZñÑáéíóúÁÉÍÓÚ0-9 ]/', '', $search);
			$terms = explode(' ',trim($search));
			$terms = array_diff($terms, array(''));

			foreach ($terms as $term) {
				
				$terms1[]=preg_replace('/[^a-zA-ZñÑáéíóúÁÉÍÓÚ0-9 ]/', '', $term);
				$conditions[]=array("Insumo.nombre LIKE" => '%'. $term . '%');
			}

			$insumos= $this->Insumo->find('all', array('recursive' => -1, 'conditions' => $conditions, 'limit' => 200));
			if(count($insumos) == 1){

				return $this->redirect(array('controller' => 'insumos', 'action' => 'view' ,$insumos[0]['Insumo']['id']));
			}

			$terms1=array_diff($terms1, array(''));
			$this->set(compact('insumos','terms1'));

		}

		$this->set(compact('search'));

		if($this->request->is('ajax')){

			$this->layout = false;
			$this->set('ajax', 1);
		}

		else{

			$this->set('ajax',0);
		}

	}


	public function isAuthorized($user)
        { if(isset($user['Role']) && $user['Role']['tipo']==='Encargado de Produccion')
            {if(in_array($this->action, array('index','add','edit','view', 'delete','minimo','searchJson','search')))
            	{return true;}

            else
            	{if($this->Auth->user('id'))
            		{$this->Session->setFlash('No tiene acceso','default', array('class'=>'alert alert-danger'));
            		$this->redirect($this->Auth->redirect());


            		}

          		}

         }

          if(isset($user['Role']) && $user['Role']['tipo']==='Gerente de Produccion')
            {if(in_array($this->action, array('minimo')))
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
