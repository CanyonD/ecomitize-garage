<?php
namespace ecomitize\garage\Vehicles;

class Helicopter {
	/**
	 * @var Vehicle $vehicle
	 */
	private $vehicle;
	private $name       = 'helicopter';
	private $fuel       = 'gas';
	private $methods    = array(
		'takeOff',
		'fly',
		'landing',
		'stop',
		'refuel'
	);

	public function __construct() {
		$this->vehicle = new Vehicle();
		$this->vehicle->setName($this->name);
		$this->vehicle->setFuel($this->fuel);
		$this->vehicle->setSupportedMethods($this->methods);
	}

	public function __call( $name, $arguments ) {
		return $this->vehicle->$name($arguments);
	}
}
