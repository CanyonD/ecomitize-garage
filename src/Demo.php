<?php
require_once('Vehicle.php');

$vehicle = new \ecomitize\garage\Vehicle(\ecomitize\garage\Vehicle::BMW);
echo $vehicle->move() . PHP_EOL;
echo $vehicle->musicOn() . PHP_EOL;
echo $vehicle->stop() . PHP_EOL;
echo $vehicle->refuel() . PHP_EOL;

$vehicle = new \ecomitize\garage\Vehicle(\ecomitize\garage\Vehicle::BOAT);
echo $vehicle->swim() . PHP_EOL;
echo $vehicle->stop() . PHP_EOL;
echo $vehicle->refuel() . PHP_EOL;

$vehicle = new \ecomitize\garage\Vehicle(\ecomitize\garage\Vehicle::HELICOPTER);
echo $vehicle->takeOff() . PHP_EOL;
echo $vehicle->fly() . PHP_EOL;
echo $vehicle->landing() . PHP_EOL;
echo $vehicle->stop() . PHP_EOL;
echo $vehicle->refuel() . PHP_EOL;

$vehicle = new \ecomitize\garage\Vehicle(\ecomitize\garage\Vehicle::KAMAZ);
echo $vehicle->move() . PHP_EOL;
echo $vehicle->stop() . PHP_EOL;
echo $vehicle->load('stone') . PHP_EOL;
echo $vehicle->move() . PHP_EOL;
echo $vehicle->stop() . PHP_EOL;
echo $vehicle->emptyLoads('stone') . PHP_EOL;
echo $vehicle->move() . PHP_EOL;
echo $vehicle->stop() . PHP_EOL;
echo $vehicle->refuel() . PHP_EOL;
