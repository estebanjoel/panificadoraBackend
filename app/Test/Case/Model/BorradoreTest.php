<?php
App::uses('Borradore', 'Model');

/**
 * Borradore Test Case
 *
 */
class BorradoreTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.borradore',
		'app.formula',
		'app.estado',
		'app.cliente',
		'app.pedido',
		'app.subestado',
		'app.pedidos_producto',
		'app.producto',
		'app.insumo',
		'app.formulas_insumo',
		'app.role',
		'app.user',
		'app.tipo',
		'app.borradores_insumo'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Borradore = ClassRegistry::init('Borradore');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Borradore);

		parent::tearDown();
	}

}
