<?php
function requireFolder(string $folder)
{
    foreach (glob(__DIR__ . "/" . $folder . "/*.php") as $file) {
        require_once $file;
    }
}
requireFolder('Objects');
requireFolder('Actions');
requireFolder('Vehicles');

$bmw = new ecomitize\garage\Vehicles\BMW();
echo $bmw->move() . PHP_EOL;
echo $bmw->musicOn() . PHP_EOL;
echo $bmw->stop() . PHP_EOL;
echo $bmw->refuel() . PHP_EOL;

$boat = new \ecomitize\garage\Vehicles\Boat();
echo $boat->swim() . PHP_EOL;
echo $boat->stop() . PHP_EOL;
echo $boat->refuel() . PHP_EOL;

$helicopter = new \ecomitize\garage\Vehicles\Helicopter();
echo $helicopter->takeOff() . PHP_EOL;
echo $helicopter->fly() . PHP_EOL;
echo $helicopter->landing() . PHP_EOL;
echo $helicopter->stop() . PHP_EOL;
echo $helicopter->refuel() . PHP_EOL;

$kamaz = new \ecomitize\garage\Vehicles\Kamaz();
echo $kamaz->move() . PHP_EOL;
echo $kamaz->stop() . PHP_EOL;
echo $kamaz->load(\ecomitize\garage\Objects\BaseObject::STONE) . PHP_EOL;
echo $kamaz->move() . PHP_EOL;
echo $kamaz->stop() . PHP_EOL;
echo $kamaz->emptyLoads(\ecomitize\garage\Objects\BaseObject::STONE) . PHP_EOL;
echo $kamaz->move() . PHP_EOL;
echo $kamaz->stop() . PHP_EOL;
echo $kamaz->refuel() . PHP_EOL;

$horse = new \ecomitize\garage\Vehicles\Horse();
echo $horse->move() . PHP_EOL;
echo $horse->stop() . PHP_EOL;
