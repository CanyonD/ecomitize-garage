<?php
namespace ecomitize\garage\Vehicles;

use PHPUnit\Runner\Exception;

class Kamaz {
	/**
	 * @var Vehicle $vehicle
	 */
	private $vehicle;
	private $name       = 'kamaz';
	private $fuel       = 'gas';
	private $methods    = array(
		'move',
		'stop',
		'load',
		'move',
		'stop',
		'emptyLoads',
		'stop',
		'refuel'
	);

	public function __construct() {
		$this->vehicle = new Vehicle();
		$this->vehicle->setName($this->name);
		$this->vehicle->setFuel($this->fuel);
		$this->vehicle->setSupportedMethods($this->methods);
//		$this->vehicle->addAction(new Move($this));
	}

	public function __call( $name, $arguments ) {
		if (method_exists($this->vehicle, $name))
			return call_user_func_array(array($this->vehicle,$name), $arguments);
		else
			throw new Exception('Not exist method');
	}
}
