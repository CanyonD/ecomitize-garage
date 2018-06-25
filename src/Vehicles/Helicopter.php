<?php
namespace ecomitize\garage\Vehicles;

use PHPUnit\Runner\Exception;

class Helicopter
{
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

    public function __construct()
    {
        $this->vehicle = new Vehicle();
        $this->vehicle->setName($this->name);
        $this->vehicle->setFuel($this->fuel);
        $this->vehicle->setSupportedMethods($this->methods);
    }

    public function __call($name, $arguments)
    {
        return call_user_func_array(array($this->vehicle, $name), $arguments);
    }
}
