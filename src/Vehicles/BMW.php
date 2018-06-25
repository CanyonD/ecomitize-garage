<?php
namespace ecomitize\garage\Vehicles;

use ecomitize\garage\Actions\Move;
use ecomitize\garage\Actions\MusicOn;
use ecomitize\garage\Actions\Refuel;
use ecomitize\garage\Actions\Stopped;

class BMW
{
    /**
     * @var Vehicle $vehicle
     */
    private $vehicle;
    private $name       = 'bmw';
    private $fuel       = 'petrol';
    private $methods    = array(
        'move',
        'musicOn',
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
        $this->vehicle->addMethod($this->methods[1], (new MusicOn())());
        $this->vehicle->addMethod($this->methods[2], (new Stopped())());
        $this->vehicle->addMethod($this->methods[3], (new Refuel())());
    }

    public function __call($name, $arguments)
    {
        return call_user_func_array(array($this->vehicle,$name), $arguments);
    }
}
