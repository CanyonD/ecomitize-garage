<?php
require_once('Vehicle.php');
require_once('BMW.php');
require_once('Boat.php');
require_once('Helicopter.php');
require_once('Kamaz.php');

$vehicle = new \ecomitize\garage\BMW();
echo $vehicle->move() . PHP_EOL;
echo $vehicle->musicOn() . PHP_EOL;
echo $vehicle->stop() . PHP_EOL;
echo $vehicle->refuel() . PHP_EOL;

$vehicle = new \ecomitize\garage\Boat();
echo $vehicle->swim() . PHP_EOL;
echo $vehicle->stop() . PHP_EOL;
echo $vehicle->refuel() . PHP_EOL;

$vehicle = new \ecomitize\garage\Helicopter();
echo $vehicle->takeOff() . PHP_EOL;
echo $vehicle->fly() . PHP_EOL;
echo $vehicle->landing() . PHP_EOL;
echo $vehicle->stop() . PHP_EOL;
echo $vehicle->refuel() . PHP_EOL;

$vehicle = new \ecomitize\garage\Kamaz();
echo $vehicle->move() . PHP_EOL;
echo $vehicle->stop() . PHP_EOL;
echo $vehicle->load('stone') . PHP_EOL;
echo $vehicle->move() . PHP_EOL;
echo $vehicle->stop() . PHP_EOL;
echo $vehicle->emptyLoads('stone') . PHP_EOL;
echo $vehicle->move() . PHP_EOL;
echo $vehicle->stop() . PHP_EOL;
echo $vehicle->refuel() . PHP_EOL;
