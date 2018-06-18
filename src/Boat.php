<?php
namespace ecomitize\garage;

class Boat extends Vehicle {
	public function __construct() {
		$this->setName(Vehicle::BOAT);
		$this->setFuel(Vehicle::FUEL_GAS);
	}

	public function swim() {
		return parent::swim();
	}
}
