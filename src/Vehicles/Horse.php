<?php
namespace ecomitize\garage\Vehicles;

use PHPUnit\Runner\Exception;

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
    }

    public function __call($name, $arguments)
    {
        return call_user_func_array(array($this->vehicle,$name), $arguments);
    }
}
