<?php
namespace ecomitize\garage;

class Kamaz extends Vehicle
{
    public function __construct()
    {
        $this->setName(Vehicle::KAMAZ);
        $this->setFuel(Vehicle::FUEL_DIESEL);
    }

    public function move() : string
    {
        return parent::move();
    }

    public function load($object) : string
    {
        return parent::load($object);
    }

    public function emptyLoads($object) : string
    {
        return parent::emptyLoads($object);
    }
}
