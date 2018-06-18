<?php
namespace ecomitize\garage;

class Kamaz extends Vehicle {
	public function __construct() {
		$this->setName(Vehicle::KAMAZ);
		$this->setFuel(Vehicle::FUEL_DIESEL);
	}

	public function move() {
		return parent::move();
	}

	public function load($object) {
		return parent::load($object);
	}

	public function emptyLoads($object) {
		return parent::emptyLoads($object);
	}
}
