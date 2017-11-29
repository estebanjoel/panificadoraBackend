<?php
App::uses('AppModel', 'Model');
/**
 * Borradore Model
 *
 * @property Formula $Formula
 * @property Estado $Estado
 * @property Insumo $Insumo
 */
class Borradore extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'formula_id';



	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Formula' => array(
			'className' => 'Formula',
			'foreignKey' => 'formula_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Estado' => array(
			'className' => 'Estado',
			'foreignKey' => 'estado_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Insumo' => array(
			'className' => 'Insumo',
			'joinTable' => 'borradores_insumos',
			'foreignKey' => 'borradore_id',
			'associationForeignKey' => 'insumo_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		)
	);

}
