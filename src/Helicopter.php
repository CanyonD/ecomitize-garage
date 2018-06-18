<?php
namespace ecomitize\garage;

class Helicopter extends Vehicle {
	public function __construct() {
		$this->setName(Vehicle::HELICOPTER);
		$this->setFuel(Vehicle::FUEL_PETROL);
	}

	public function takeOff() {
		return parent::takeOff();
	}

	public function fly() {
		return parent::fly();
	}

	public function landing () {
		return parent::landing();
	}
}
