<?php
App::uses('AppController', 'Controller');
/**
 * Formulas Controller
 *
 * @property Formula $Formula
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class FormulasController extends AppController {

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
			'Formula.id'=>'asc'));

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Formula->recursive = 0;
		$this->paginate['Formula']['limit']=5;
		$this->paginate['Formula']['order']=array('Formula.id'=>'asc');
		//$this->paginate['Formula']['conditions'] =>('Formula.nombre' => '')
		$this->set('formulas', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Formula->exists($id)) {
			throw new NotFoundException(__('Invalid formula'));
		}
		$options = array('conditions' => array('Formula.' . $this->Formula->primaryKey => $id));
		$this->set('formula', $this->Formula->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Formula->create();
			if ($this->Formula->save($this->request->data)) {
				//$this->Session->setFlash('La Formula ha sido creada correctamente', 'default',array('class'=>'container alert alert-success text-center'));
				return $this->redirect(array('action' => 'add_cantidad'));
			} else {
				//$this->Session->setFlash('La Formula no pudo crearse, intentelo nuevamente', 'default',array('class'=>'container alert alert-danger text-center'));
			}
		}
		$estados = $this->Formula->Estado->find('list');
		$productos = $this->Formula->Producto->find('list');
		$insumos = $this->Formula->Insumo->find('list');
		$this->set(compact('estados', 'productos','insumos'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Formula->exists($id)) {
			throw new NotFoundException(__('Invalid formula'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Formula->save($this->request->data)) {
				return $this->redirect(array('action' => 'edit_cantidad',$this->Formula->id));
			} 
			
		} else {
			$options = array('conditions' => array('Formula.' . $this->Formula->primaryKey => $id));
			$this->request->data = $this->Formula->find('first', $options);
		}
		$estados = $this->Formula->Estado->find('list');
		$productos = $this->Formula->Producto->find('list');
		$insumos = $this->Formula->Insumo->find('list');
		$this->set(compact('estados', 'productos','insumos'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		
		$this->Formula->id = $id;
		if (!$this->Formula->exists()) {
			throw new NotFoundException(__('Invalid producto'));
		}
   		
		$this->request->allowMethod('post', 'delete');
   		if ($this->Formula->saveField('estado_id', 2)){

   			$this->Session->setFlash('La Formula ha sido eliminada correctamente', 'default',array('class'=>'container alert alert-success text-center'));
		} 

		else {
			$this->Session->setFlash('La Formula no pudo eliminarse, intentelo nuevamente', 'default',array('class'=>'container alert alert-danger text-center'));
		}
		return $this->redirect(array('action' => 'index'));

   	}

   	public function add_cantidad(){

   		$formula=$this->Formula->find('first',array('order' => array('Formula.id' => 'DESC')));
   		$insumos=$this->Formula->FormulasInsumo->find('all',array('conditions'=>array('FormulasInsumo.formula_id'=>$formula['Formula']['id'])));

   		$cantidades=$this->request->data;
   		$i=0;
   		foreach ($cantidades['datos'] as $cantidad){

   			$this->Formula->FormulasInsumo->updateAll(array('FormulasInsumo.cantidad'=>"'".$cantidad."'"), array('FormulasInsumo.insumo_id'=>$insumos[$i]['FormulasInsumo']['insumo_id'],'FormulasInsumo.formula_id'=>$formula['Formula']['id'],'FormulasInsumo.id'=>$insumos[$i]['FormulasInsumo']['id']));
   			$i++;

   		}
   		
   		if($i!=0){

   			$this->Session->setFlash('La Formula ha sido creada correctamente', 'default',array('class'=>'container alert alert-success text-center'));
   			return $this->redirect(array('action' => 'index'));
   		}
   		else{
   			$this->Session->setFlash('La Formula no pudo crearse, intentelo nuevamente', 'default',array('class'=>'container alert alert-danger text-center'));
   		}

   		$this->set('insumos',$insumos);
   		$this->set('formula',$formula);

   	}

   	public function edit_cantidad($id=null){

   		$this->Formula->id = $id;
		if (!$this->Formula->exists()) {
			throw new NotFoundException(__('Invalid Formula'));
		}
		else{
	   		$formula=$this->Formula->find('first',array('conditions'=>(array('Formula.id'=>$id))));
	   		$insumos=$this->Formula->FormulasInsumo->find('all',array('conditions'=>array('FormulasInsumo.formula_id'=>$formula['Formula']['id'])));

	   		$cantidades=$this->request->data;
	   		$i=0;
	   		foreach ($cantidades['datos'] as $cantidad){

	   			$this->Formula->FormulasInsumo->updateAll(array('FormulasInsumo.cantidad'=>"'".$cantidad."'"), array('FormulasInsumo.insumo_id'=>$insumos[$i]['FormulasInsumo']['insumo_id'],'FormulasInsumo.formula_id'=>$formula['Formula']['id'],'FormulasInsumo.id'=>$insumos[$i]['FormulasInsumo']['id']));
	   			$i++;

	   		}
	   		
	   		if($i!=0){

	   			$this->Session->setFlash('La Formula ha sido modificada correctamente', 'default',array('class'=>'container alert alert-success text-center'));
	   			return $this->redirect(array('action' => 'index'));
	   		}
	   		else{
	   			$this->Session->setFlash('La Formula no pudo modificarse, intentelo nuevamente', 'default',array('class'=>'container alert alert-danger text-center'));
	   		}
			
			$this->set('insumos',$insumos);
	   		$this->set('formula',$formula);
	   	}

   	}

	public function searchJson(){

		$term = null;
		if(!empty($this->request->query['term'])){

			$term = $this->request->query['term'];
			$terms = explode(' ',trim($term));
			$terms = array_diff($terms, array(''));
			foreach ($terms as $term){
				
				$conditions[]=array('Formula.nombre LIKE' => '%' . $term . '%');
			}

			$formulas = $this->Formula->find('all',array('recursive' => -1, 'fields' => array('Formula.id','Formula.nombre'), 'conditions' => $conditions, 'limit' => 20));

		}

		echo json_encode($formulas);
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
				$conditions[]=array("Formula.nombre LIKE" => '%'. $term . '%');
			}

			$formulas= $this->Formula->find('all', array('recursive' => -1, 'conditions' => $conditions, 'limit' => 200));
			if(count($formulas) == 1){

				return $this->redirect(array('controller' => 'formulas', 'action' => 'view' ,$formulas[0]['Formula']['id']));
			}

			$terms1=array_diff($terms1, array(''));
			$this->set(compact('formulas','terms1'));

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
            {if(in_array($this->action, array('index','add','edit','view','delete','search','add_cantidad')))
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
