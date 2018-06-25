<?php
namespace ecomitize\garage\Vehicles;

use ecomitize\garage\Actions\{
	Load, Move, Refuel, Stopped, EmptyLoad
};

class Kamaz
{
    /**
     * @var Vehicle $vehicle
     */
    private $vehicle;
    private $name       = 'kamaz';
    private $fuel       = 'gas';
    private $methods    = array(
        'move',
        'stop',
        'load',
        'move',
        'stop',
        'emptyLoads',
        'stop',
        'refuel'
    );

    public function __construct()
    {
        $this->vehicle = new Vehicle();
        $this->vehicle->setName($this->name);
        $this->vehicle->setFuel($this->fuel);
        $this->vehicle->setSupportedMethods($this->methods);
        $this->vehicle->addMethod($this->methods[0], (new Move())());
        $this->vehicle->addMethod($this->methods[1], (new Stopped())());
        $this->vehicle->addMethod($this->methods[2], (new Load())());
        $this->vehicle->addMethod($this->methods[3], (new Move())());
//      $this->vehicle->addMethod($this->methods[4], (new Stopped())());
        $this->vehicle->addMethod($this->methods[5], (new EmptyLoad())());
//      $this->vehicle->addMethod($this->methods[6], (new Stopped())());
        $this->vehicle->addMethod($this->methods[7], (new Refuel())());
    }

    public function __call($name, $arguments)
    {
        return call_user_func_array(array($this->vehicle,$name), $arguments);
    }
}
