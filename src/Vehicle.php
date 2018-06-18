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
    protected function ping() : string
    {
        return 'I am ' . $this->getName() .'!';
    }

    /**
     * @return string
     */
    public function refuel($fuel = null) : string
    {
        return $this->getName() . ' refuel ' . ($fuel ? $fuel : $this->fuel);
    }

    /**
     * @return string
     */
    public function stop() : string
    {
        return $this->getName() . ' stopped';
    }

    /**
     * @return string
     */
    protected function move() : string
    {
        return $this->getName() . ' moving';
    }

    /**
     * @return string
     */
    protected function musicOn() : string
    {
        return $this->getName() . ' music switched on';
    }

    /**
     * @return string
     */
    protected function takeOff() : string
    {
        return $this->getName() . ' took off';
    }

    /**
     * @return string
     */
    protected function landing() : string
    {
        return $this->getName() . ' landing';
    }

    /**
     * @return string
     */
    protected function fly() : string
    {
        return $this->getName() . ' flying';
    }

    /**
     * @return string
     */
    protected function swim() : string
    {
        return $this->getName() . ' swimming';
    }

    /**
     * @param string $object
     * @return string
     */
    protected function load($object) : string
    {
        $this->loadObject = $object;
        return $this->getName() . ' load ' . $object;
    }

    /**
     * @param string $object
     * @return string
     */
    protected function emptyLoads($object) : string
    {
        return $this->getName() . ' unload ' . ($object ? $object : $this->loadObject);
    }
}
