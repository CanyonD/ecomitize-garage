<?php
class Vehicle
{
    public $name;
    public function __construct($name)
    {
        $this->name = $name;
    }
    public function move()
    {
        if($this->name == 'bmw' || $this->name == 'kamaz' || $this->name == 'harley-davidson')
            echo $this->name . ' moving' . PHP_EOL;
    }
	public function stop() {
		echo $this->name . ' stopped' . PHP_EOL;
	}
    public function musicOn()
    {
        echo $this->name . ' music switched on' . PHP_EOL;
    }
    public function takeOff()
    {
        echo $this->name . ' took off' . PHP_EOL;
    }
    public function landing()
    {
        echo $this->name . ' landing' . PHP_EOL;
    }
    public function fly()
    {
        echo $this->name . ' flying' . PHP_EOL;
    }
    public function swim()
    {
        echo $this->name . ' swimming' . PHP_EOL;
    }
	public function emptyLoads($object) 
	{
		echo $this->name . ' unload ' . $object . PHP_EOL;
	}
	public function refuel($fuel)
	{
		echo $this->name . ' refuel ' . $fuel . PHP_EOL;
	}
}
$vehicles = [
    new Vehicle('bmw'),
	new Vehicle('boat'),
	new Vehicle('helicopter'),
	new Vehicle('kamaz')
];
foreach($vehicles as $vehicle) {
    switch($vehicle->name)
    {
        case 'bmw':
            $vehicle->move();
            $vehicle->musicOn();
            break;
        case 'boat':
            $vehicle->move();
            $vehicle->swim();
            break;
        case 'helicopter':
            $vehicle->takeOff();
            $vehicle->fly();
            $vehicle->landing();
            break;
        case 'kamaz':
        	$vehicle->move();
			$vehicle->stop();
            $vehicle->emptyLoads('stones');
            break;
    }
	$vehicle->stop();
    $vehicle->refuel('gas');
	echo PHP_EOL;
}
