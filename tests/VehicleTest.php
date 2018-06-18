<?php
namespace unit\ecomitize\garage;

use PHPUnit\Framework\TestCase;
use PHPUnit\Runner\Exception;
use ecomitize\garage\Vehicle;
use ecomitize\garage\BMW;
use ecomitize\garage\Boat;
use ecomitize\garage\Helicopter;
use ecomitize\garage\Kamaz;

class VehicleTest extends TestCase
{

    /**
     * @var BMW $bmw
     */
    private $bmw;

    /**
     * @var Kamaz $kamaz
     */
    private $kamaz;

    /**
     * @var Boat $boat
     */
    private $boat;

    /**
     * @var Helicopter $helicopter
     */
    private $helicopter;

    private $calledMethods = array(
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

    public function setUp()
    {
        $this->bmw = new BMW();
        $this->boat = new Boat();
        $this->helicopter = new Helicopter();
        $this->kamaz = new Kamaz();
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
     * @param Vehicle|BMW|Boat|Helicopter|Kamaz $object
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
        foreach ($this->calledMethods[$name] as $methodName) {
            try {
                $reflection = new \ReflectionMethod(get_class($object), $methodName);
                if (!$reflection->getNumberOfRequiredParameters()) {
                    echo $object->$methodName() . PHP_EOL;
                } else {
                    echo $object->$methodName('stone') . PHP_EOL;          // Fix for KAMAZ object
                }
            } catch (Exception $e) {
                $this->fail('Method ' . $methodName . ' not supported');
            }
        }

        foreach ($classMethods as $methodName) {
            if (preg_match('/(s|g)et*|__construct/', $methodName)) {
                continue;       // Skip for setters, getters and constructors
            }
            $this->assertTrue(
                in_array($methodName, $this->calledMethods[$name]),
                'Wrong method ' . $methodName
            );
        }
    }
}
