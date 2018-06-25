<?php
require_once('BaseVehicle.php');
require_once('Vehicle.php');
require_once('BaseObject.php');

$vehicle = new \ecomitize\garage\Vehicle(\ecomitize\garage\BaseVehicle::BMW);
echo $vehicle->move() . PHP_EOL;
echo $vehicle->musicOn() . PHP_EOL;
echo $vehicle->stop() . PHP_EOL;
echo $vehicle->refuel() . PHP_EOL;

$vehicle = new \ecomitize\garage\Vehicle(\ecomitize\garage\BaseVehicle::BOAT);
echo $vehicle->swim() . PHP_EOL;
echo $vehicle->stop() . PHP_EOL;
echo $vehicle->refuel() . PHP_EOL;

$vehicle = new \ecomitize\garage\Vehicle(\ecomitize\garage\BaseVehicle::HELICOPTER);
echo $vehicle->takeOff() . PHP_EOL;
echo $vehicle->fly() . PHP_EOL;
echo $vehicle->landing() . PHP_EOL;
echo $vehicle->stop() . PHP_EOL;
echo $vehicle->refuel() . PHP_EOL;

$vehicle = new \ecomitize\garage\Vehicle(\ecomitize\garage\BaseVehicle::KAMAZ);
echo $vehicle->move() . PHP_EOL;
echo $vehicle->stop() . PHP_EOL;
echo $vehicle->load(\ecomitize\garage\BaseObject::STONE) . PHP_EOL;
echo $vehicle->move() . PHP_EOL;
echo $vehicle->stop() . PHP_EOL;
echo $vehicle->emptyLoads(\ecomitize\garage\BaseObject::STONE) . PHP_EOL;
echo $vehicle->move() . PHP_EOL;
echo $vehicle->stop() . PHP_EOL;
echo $vehicle->refuel() . PHP_EOL;

$vehicle = new \ecomitize\garage\Vehicle(\ecomitize\garage\BaseVehicle::HORSE);
echo $vehicle->move() . PHP_EOL;
echo $vehicle->stop() . PHP_EOL;
