<?php
namespace ecomitize\garage\Vehicles;

use ecomitize\garage\Actions\Action;
use PHPUnit\Runner\Exception;

class Vehicle
{
    private $name       = '';
    private $fuel       = '';
    private $loadObject = '';
    private $supportedMethods = [];
//  private $action;

    public function __construct($name = '', $fuel = '')
    {
        $this->name = $name;
        $this->fuel = $fuel;
    }

    /**
     * @return mixed
     */
    public function getName() : string
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     * @return Vehicle
     */
    public function setName($name) : Vehicle
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFuel() : string
    {
        return $this->fuel;
    }

    /**
     * @param mixed $fuel
     * @return Vehicle
     */
    public function setFuel($fuel) : Vehicle
    {
        $this->fuel = $fuel;
        return $this;
    }

    /**
     * @return array
     */
    public function getSupportedMethods(): array
    {
        return $this->supportedMethods;
    }

    /**
     * @param array $supportedMethods
     * @return Vehicle
     */
    public function setSupportedMethods(array $supportedMethods)
    {
        $this->supportedMethods = $supportedMethods;
        return $this;
    }

    /**
     * @return string
     */
    public function ping() : string
    {
        return 'I am ' . $this->getName() .'!';
    }

    /**
     * @param string $fuel
     * @return string
     * @throws \Exception
     */
    public function refuel($fuel = null) : string
    {
        if ($this->isSupported(__FUNCTION__)) {
            throw new \Exception('Not supported');
        }
        return $this->getName() . ' refuel ' . ($fuel ? $fuel : $this->fuel);
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function stop() : string
    {
        if ($this->isSupported(__FUNCTION__)) {
            throw new \Exception('Not supported');
        }
        return $this->getName() . ' stopped';
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function move() : string
    {
        if ($this->isSupported(__FUNCTION__)) {
            throw new \Exception('Not supported');
        }
        return $this->getName() . ' moving';
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function musicOn() : string
    {
        if ($this->isSupported(__FUNCTION__)) {
            throw new \Exception('Not supported');
        }
        return $this->getName() . ' music switched on';
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function takeOff() : string
    {
        if ($this->isSupported(__FUNCTION__)) {
            throw new \Exception('Not supported');
        }
        return $this->getName() . ' took off';
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function landing() : string
    {
        if ($this->isSupported(__FUNCTION__)) {
            throw new \Exception('Not supported');
        }
        return $this->getName() . ' landing';
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function fly() : string
    {
        if ($this->isSupported(__FUNCTION__)) {
            throw new \Exception('Not supported');
        }
        return $this->getName() . ' flying';
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function swim() : string
    {
        if ($this->isSupported(__FUNCTION__)) {
            throw new \Exception('Not supported');
        }
        return $this->getName() . ' swimming';
    }

    /**
     * @param string $object
     * @return string
     * @throws \Exception
     */
    public function load($object) : string
    {
        if ($this->isSupported(__FUNCTION__)) {
            throw new \Exception('Not supported');
        }
        $this->loadObject = $object;
        return $this->getName() . ' load ' . $object;
    }

    /**
     * @param string $object
     * @return string
     * @throws \Exception
     */
    public function emptyLoads($object) : string
    {
        if ($this->isSupported(__FUNCTION__)) {
            throw new \Exception('Not supported');
        }
        return $this->getName() . ' unload ' . ($object ? $object : $this->loadObject);
    }

    private function isSupported($method) : bool
    {
        return !in_array($method, $this->supportedMethods);
    }

    /**
     * @param string $name
     * @param Action $method
     *
     * @return Vehicle
     */
    public function addMethod($name, $method) : Vehicle
    {
        $this->{$name} = $method->get();
        return $this;
    }

    public function __call(string $name, array $args)
    {
        throw new Exception("Instance method " . $name . " doesn't exist");
    }
}
