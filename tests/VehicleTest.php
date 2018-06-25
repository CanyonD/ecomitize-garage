<?php
namespace unit\ecomitize\garage;

use ecomitize\garage\Objects\BaseObject;
use ecomitize\garage\Vehicles\BMW;
use ecomitize\garage\Vehicles\Boat;
use ecomitize\garage\Vehicles\Helicopter;
use ecomitize\garage\Vehicles\Kamaz;
use ecomitize\garage\Vehicles\Horse;
use ecomitize\garage\Vehicles\Vehicle;
use PHPUnit\Framework\TestCase;

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
        $this->bmw = new BMW();
        $this->boat = new Boat();
        $this->helicopter = new Helicopter();
        $this->kamaz = new Kamaz();
        $this->horse = new Horse();
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
        $this->init($this->bmw, $this->bmw->getName());
        $this->init($this->boat, $this->boat->getName());
        $this->init($this->helicopter, $this->helicopter->getName());
        $this->init($this->kamaz, $this->kamaz->getName());
        $this->init($this->horse, $this->horse->getName());
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
        $this->method($this->bmw);
        $this->method($this->boat);
        $this->method($this->helicopter);
        $this->method($this->kamaz);
        $this->method($this->horse);
    }

    /**
     * @param Vehicle $object
     */
    private function method($object)
    {
        echo PHP_EOL;
        foreach ($object->getSupportedMethods() as $methodName) {
            try {
                $reflection = new \ReflectionMethod(Vehicle::class, $methodName);
                $numberParams = $reflection->getNumberOfRequiredParameters();
                echo ($numberParams ? $object->$methodName(BaseObject::STONE) : $object->$methodName()) . PHP_EOL;
            } catch (\Exception $e) {
                $this->fail('Method ' . $methodName . ' not supported');
            }
        }

        foreach (get_class_methods(Vehicle::class) as $methodName) {
            if (preg_match('/(s|g)et*|__|add|ping/', $methodName) ||
                in_array($methodName, $object->getSupportedMethods())
            ) {
                continue;       // Skip for ping, add, setters, getters and constructors
            }
            $exception = false;
            try {
                $reflection = new \ReflectionMethod(Vehicle::class, $methodName);
                $numberParams = $reflection->getNumberOfRequiredParameters();
                echo ($numberParams ? $object->$methodName(BaseObject::STONE) : $object->$methodName()) . PHP_EOL;
            } catch (\Exception $e) {
                $exception = true;
            }
            $this->assertTrue($exception, 'Wrong method ' . $methodName);
        }
    }
}
