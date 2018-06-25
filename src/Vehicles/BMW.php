<?php
namespace ecomitize\garage\Vehicles;

use ecomitize\garage\Actions\Move;
use PHPUnit\Runner\Exception;

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
//      $this->vehicle->addMethod('_move', new Move($this->name));
    }

    public function __call($name, $arguments)
    {
        return call_user_func_array(array($this->vehicle,$name), $arguments);
    }
}
