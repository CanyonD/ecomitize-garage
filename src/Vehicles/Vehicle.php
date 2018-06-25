<?php
namespace ecomitize\garage\Vehicles;

class Vehicle
{
    private $name       = '';
    private $fuel       = '';
    private $loadObject = '';
    private $supportedMethods = [];
    private $action = [];

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
    public function getSupportedMethods() : array
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
    public function getObject() : string
    {
        return $this->loadObject;
    }

    /**
     * @param string $loadObject
     * @return Vehicle
     */
    public function setObject(string $loadObject)
    {
        $this->loadObject = $loadObject;
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
     * @param string $name
     * @param $method
     *
     * @return Vehicle
     */
    public function addMethod($name, $method = null) : Vehicle
    {
        $this->action[static::class][$name] = $method;
        return $this;
    }

    /**
     * @param string $name
     */
    public function getMethod($name)
    {
        return $this->action[static::class][$name];
    }

    public function __call($key, $arguments = [])
    {
        if (isset($this->action[static::class][$key]) && is_callable($this->action[static::class][$key])) {
            return call_user_func_array(\Closure::bind($this->action[static::class][$key], $this), $arguments);
        }
        throw new \Exception("Instance method " . $key . " doesn't exist");
    }
}
