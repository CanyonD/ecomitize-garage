<?php
namespace ecomitize\garage;

class BMW extends Vehicle {
	public function __construct() {
		$this->setName(Vehicle::BMW);
		$this->setFuel(Vehicle::FUEL_GAS);
	}

	public function move() : string {
		return parent::move();
	}

	public function musicOn() : string {
		return parent::musicOn();
	}
}
