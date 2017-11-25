<?php
App::uses('PedidosProducto', 'Model');

/**
 * PedidosProducto Test Case
 *
 */
class PedidosProductoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.pedidos_producto',
		'app.pedido',
		'app.estado',
		'app.cliente',
		'app.formula',
		'app.producto',
		'app.insumo',
		'app.formulas_insumo',
		'app.role',
		'app.user',
		'app.subestado',
		'app.tipo'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->PedidosProducto = ClassRegistry::init('PedidosProducto');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->PedidosProducto);

		parent::tearDown();
	}

}
