<?php
namespace ecomitize\garage\Vehicles;

use ecomitize\garage\Actions\{
	Fly, Landing, Refuel, Stopped, TakeOff
};

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
        $this->vehicle->addMethod($this->methods[0], (new TakeOff())());
        $this->vehicle->addMethod($this->methods[1], (new Fly())());
        $this->vehicle->addMethod($this->methods[2], (new Landing())());
        $this->vehicle->addMethod($this->methods[3], (new Stopped())());
        $this->vehicle->addMethod($this->methods[4], (new Refuel())());
    }

    public function __call($name, $arguments)
    {
        return call_user_func_array(array($this->vehicle, $name), $arguments);
    }
}
