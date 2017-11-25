<?php
App::uses('Pedido', 'Model');

/**
 * Pedido Test Case
 *
 */
class PedidoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.pedido',
		'app.estado',
		'app.cliente',
		'app.formula',
		'app.producto',
		'app.epedido',
		'app.insumo',
		'app.formulas_insumo',
		'app.role',
		'app.user',
		'app.subestado',
		'app.tipo',
		'app.pedidos_producto'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Pedido = ClassRegistry::init('Pedido');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Pedido);

		parent::tearDown();
	}

}
