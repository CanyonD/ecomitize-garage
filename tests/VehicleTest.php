<?php
namespace unit\ecomitize\garage;

use ecomitize\garage\BaseObject;
use ecomitize\garage\BaseVehicle;
use PHPUnit\Framework\TestCase;
use ecomitize\garage\Vehicle;

class VehicleTest extends TestCase
{
    /**
     * @var Vehicle $bmw
     */
    private $bmw;

    /**
     * @var Vehicle $kamaz
     */
    private $kamaz;

    /**
     * @var Vehicle $boat
     */
    private $boat;

    /**
     * @var Vehicle $helicopter
     */
    private $helicopter;

    /**
     * @var Vehicle $horse
     */
    private $horse;

    public function setUp()
    {
        $this->bmw = new Vehicle(BaseVehicle::BMW, BaseVehicle::FUEL_PETROL);
        $this->boat = new Vehicle(BaseVehicle::BOAT, BaseVehicle::FUEL_GAS);
        $this->helicopter = new Vehicle(BaseVehicle::HELICOPTER, BaseVehicle::FUEL_GAS);
        $this->kamaz = new Vehicle(BaseVehicle::KAMAZ, BaseVehicle::FUEL_DIESEL);
        $this->horse = new Vehicle(BaseVehicle::HORSE);
    }

    public function tearDown()
    {
        $this->bmw = null;
        $this->boat = null;
        $this->helicopter = null;
        $this->kamaz = null;
        $this->horse = null;
    }

    public function testInit()
    {
        $this->init($this->bmw, BaseVehicle::BMW);
        $this->init($this->boat, BaseVehicle::BOAT);
        $this->init($this->helicopter, BaseVehicle::HELICOPTER);
        $this->init($this->kamaz, BaseVehicle::KAMAZ);
        $this->init($this->horse, BaseVehicle::HORSE);
    }

    /**
     * @param Vehicle $object
     * @param string $name
     */
    private function init($object, $name)
    {
        $this->assertEquals(
            $object->getName(),
            $name,
            $name . ' wrong name'
        );
    }

    public function testMethods()
    {
        $this->method($this->bmw, BaseVehicle::BMW);
        $this->method($this->boat, BaseVehicle::BOAT);
        $this->method($this->helicopter, BaseVehicle::HELICOPTER);
        $this->method($this->kamaz, BaseVehicle::KAMAZ);
        $this->method($this->horse, BaseVehicle::HORSE);
    }

    private function method($object, $name)
    {
        $classMethods = get_class_methods($object);

        echo PHP_EOL;
        foreach (BaseVehicle::SUPPORTED_METHODS[$name] as $methodName) {
            try {
                $reflection = new \ReflectionMethod(get_class($object), $methodName);
                $numberParams = $reflection->getNumberOfRequiredParameters();
                echo $numberParams ? $object->$methodName(BaseObject::STONE) . PHP_EOL : $object->$methodName() . PHP_EOL;
            } catch (\Exception $e) {
                $this->fail('Method ' . $methodName . ' not supported');
            }
        }

        foreach ($classMethods as $methodName) {
            if (preg_match('/(s|g)et*|__construct|ping/', $methodName) ||
                in_array($methodName, BaseVehicle::SUPPORTED_METHODS[$name])
            ) {
                continue;       // Skip for setters, getters and constructors
            }
            $exception = false;
            try {
                $reflection = new \ReflectionMethod(get_class($object), $methodName);
                $numberParams = $reflection->getNumberOfRequiredParameters();
                echo $numberParams ? $object->$methodName(BaseObject::STONE) . PHP_EOL : $object->$methodName() . PHP_EOL;
            } catch (\Exception $e) {
                $exception = true;
            }
            $this->assertTrue($exception, 'Wrong method ' . $methodName);
        }
    }
}
