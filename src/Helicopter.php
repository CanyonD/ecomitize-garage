<?php
namespace ecomitize\garage;

class Helicopter extends Vehicle
{
    public function __construct()
    {
        $this->setName(Vehicle::HELICOPTER);
        $this->setFuel(Vehicle::FUEL_PETROL);
    }

    public function takeOff() : string
    {
        return parent::takeOff();
    }

    public function fly() : string
    {
        return parent::fly();
    }

    public function landing() : string
    {
        return parent::landing();
    }
}
