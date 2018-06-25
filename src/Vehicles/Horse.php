<?php
namespace ecomitize\garage\Vehicles;

class Horse {
	/**
	 * @var Vehicle $vehicle
	 */
	private $vehicle;
	private $name       = 'horse';
	private $methods    = array(
		'move',
		'stop',
	);

	public function __construct() {
		$this->vehicle = new Vehicle();
		$this->vehicle->setName($this->name);
		$this->vehicle->setSupportedMethods($this->methods);
	}

	public function __call( $name, $arguments ) {
		return $this->vehicle->$name($arguments);
	}
}
