<?php
namespace ecomitize\garage\Vehicles;

use ecomitize\garage\Actions\Move;
use ecomitize\garage\Actions\Stopped;

class Horse
{
    /**
     * @var Vehicle $vehicle
     */
    private $vehicle;
    private $name       = 'horse';
    private $methods    = array(
        'move',
        'stop',
    );

    public function __construct()
    {
        $this->vehicle = new Vehicle();
        $this->vehicle->setName($this->name);
        $this->vehicle->setSupportedMethods($this->methods);
        $this->vehicle->addMethod($this->methods[0], (new Move())());
        $this->vehicle->addMethod($this->methods[1], (new Stopped())());
    }

    public function __call($name, $arguments)
    {
        return call_user_func_array(array($this->vehicle,$name), $arguments);
    }
}
