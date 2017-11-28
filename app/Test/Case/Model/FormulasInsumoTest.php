<?php
App::uses('FormulasInsumo', 'Model');

/**
 * FormulasInsumo Test Case
 *
 */
class FormulasInsumoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.formulas_insumo',
		'app.formula',
		'app.estado',
		'app.cliente',
		'app.pedido',
		'app.subestado',
		'app.producto',
		'app.pedidos_producto',
		'app.insumo',
		'app.role',
		'app.user',
		'app.tipo'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->FormulasInsumo = ClassRegistry::init('FormulasInsumo');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->FormulasInsumo);

		parent::tearDown();
	}

}
