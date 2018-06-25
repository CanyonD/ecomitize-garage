<?php
namespace ecomitize\garage\Vehicles;

use ecomitize\garage\Actions\Refuel;
use ecomitize\garage\Actions\Stopped;
use ecomitize\garage\Actions\Swim;

class Boat
{
    /**
     * @var Vehicle $vehicle
     */
    private $vehicle;
    private $name       = 'boat';
    private $fuel       = 'petrol';
    private $methods    = array(
        'swim',
        'stop',
        'refuel'
    );

    public function __construct()
    {
        $this->vehicle = new Vehicle();
        $this->vehicle->setName($this->name);
        $this->vehicle->setFuel($this->fuel);
        $this->vehicle->setSupportedMethods($this->methods);
        $this->vehicle->addMethod($this->methods[0], (new Swim())());
        $this->vehicle->addMethod($this->methods[1], (new Stopped())());
        $this->vehicle->addMethod($this->methods[2], (new Refuel())());
    }

    public function __call($name, $arguments)
    {
        return call_user_func_array(array($this->vehicle, $name), $arguments);
    }
}
