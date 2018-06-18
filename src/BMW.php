<?php
namespace ecomitize\garage;

class BMW extends Vehicle {
	public function __construct() {
		$this->setName(Vehicle::BMW);
		$this->setFuel(Vehicle::FUEL_GAS);
	}

	public function move() {
		return parent::move();
	}

	public function musicOn() {
		return parent::musicOn();
	}
}
