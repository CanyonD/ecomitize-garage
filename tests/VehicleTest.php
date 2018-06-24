<?php
namespace unit\ecomitize\garage;

use PHPUnit\Framework\TestCase;
use PHPUnit\Runner\Exception;
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

    public function setUp()
    {
        $this->bmw = new Vehicle(Vehicle::BMW);
        $this->boat = new Vehicle(Vehicle::BOAT);
        $this->helicopter = new Vehicle(Vehicle::HELICOPTER);
        $this->kamaz = new Vehicle(Vehicle::KAMAZ);
    }

    public function tearDown()
    {
        $this->bmw = null;
        $this->boat = null;
        $this->helicopter = null;
        $this->kamaz = null;
    }

    public function testInit()
    {
        $this->init($this->bmw, Vehicle::BMW);
        $this->init($this->boat, Vehicle::BOAT);
        $this->init($this->helicopter, Vehicle::HELICOPTER);
        $this->init($this->kamaz, Vehicle::KAMAZ);
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
        $this->method($this->bmw, Vehicle::BMW);
        $this->method($this->boat, Vehicle::BOAT);
        $this->method($this->helicopter, Vehicle::HELICOPTER);
        $this->method($this->kamaz, Vehicle::KAMAZ);
    }

    private function method($object, $name)
    {
        $classMethods = get_class_methods($object);

        echo PHP_EOL;
        foreach (Vehicle::SUPPORTED_METHODS[$name] as $methodName) {
            try {
                $reflection = new \ReflectionMethod(get_class($object), $methodName);
                $numberParams = $reflection->getNumberOfRequiredParameters();
                echo $numberParams ? $object->$methodName('stone') . PHP_EOL : $object->$methodName() . PHP_EOL;
            } catch (\Exception $e) {
                $this->fail('Method ' . $methodName . ' not supported');
            }
        }

        foreach ($classMethods as $methodName) {
            if (preg_match('/(s|g)et*|__construct|ping/', $methodName) ||
                in_array($methodName, Vehicle::SUPPORTED_METHODS[$name])
            ) {
                continue;       // Skip for setters, getters and constructors
            }
            $exception = false;
            try {
                $reflection = new \ReflectionMethod(get_class($object), $methodName);
                $numberParams = $reflection->getNumberOfRequiredParameters();
                echo $numberParams ? $object->$methodName('stone') . PHP_EOL : $object->$methodName() . PHP_EOL;
            } catch (\Exception $e) {
                $exception = true;
            }
            $this->assertTrue($exception, 'Wrong method ' . $methodName);
        }
    }
}
