<?php
namespace ecomitize\garage;

class Vehicle
{
    private $name       = '';
    private $fuel       = '';
    private $loadObject = '';

    public const BMW                = 'bmw';
    public const KAMAZ              = 'kamaz';
    public const HARLEY_DAVIDSON    = 'harley-davidson';
    public const BOAT               = 'boat';
    public const HELICOPTER         = 'helicopter';

    public const FUEL_GAS       = 'gas';
    public const FUEL_DIESEL    = 'diesel';
    public const FUEL_PETROL    = 'petrol';

    public const SUPPORTED_METHODS = array(
        Vehicle::BMW => array(
            'move',
            'musicOn',
            'stop',
            'refuel'
        ),
        Vehicle::BOAT => array(
            'swim',
            'stop',
            'refuel'
        ),
        Vehicle::HELICOPTER => array(
            'takeOff',
            'fly',
            'landing',
            'stop',
            'refuel'
        ),
        Vehicle::KAMAZ => array(
            'move',
            'stop',
            'load',
            'move',
            'stop',
            'emptyLoads',
            'stop',
            'refuel'
        ),
    );

    public function __construct($name)
    {
        $this->name = $name;
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
     * @return string
     */
    public function ping() : string
    {
        return 'I am ' . $this->getName() .'!';
    }

    /**
     * @param string $fuel
     * @return string
     */
    public function refuel($fuel = null) : string
    {
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

    private function isSupported($method)
    {
//      print_r($method);
//      print_r($this->name);
        return !in_array($method, Vehicle::SUPPORTED_METHODS[$this->name]);
    }
}
