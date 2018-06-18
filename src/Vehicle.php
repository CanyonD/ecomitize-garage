<?php
namespace ecomitize\garage;

use PHPUnit\Runner\Exception;

class Vehicle {
	private $name       = '';
	private $fuel       = '';
	private $loadObject = '';

	public const BMW                = 'bmw';
	public const KAMAZ              = 'kamaz';
	public const HARLEY_DAVIDSON    = 'harley-davidson';
	public const BOAT               = 'boat';
	public const HELICOPTER         = 'helicopter';

	public const FUEL_GAS       = 'gas';
	public const FUEL_DIESEL    = 'diesel';
	public const FUEL_PETROL    = 'petrol';

	/**
	 * @return mixed
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * @param mixed $name
	 * @return Vehicle
	 */
	public function setName( $name ) {
		$this->name = $name;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getFuel() {
		return $this->fuel;
	}

	/**
	 * @param mixed $fuel
	 * @return Vehicle
	 */
	public function setFuel( $fuel ) {
		$this->fuel = $fuel;
		return $this;
	}
	/**
	 * @return string
	 */
	protected function ping() {
		return 'I am ' . $this->getName() .'!';
	}

	/**
	 * @return string
	 */
	public function refuel ($fuel = null) {
		return $this->getName() . ' refuel ' . ($fuel ? $fuel : $this->fuel);
	}

	/**
	 * @return string
	 */
	public function stop() {
		return $this->getName() . ' stopped';
	}

	/**
	 * @return string
	 */
	protected function move () {
		return $this->getName() . ' moving';
	}

	/**
	 * @return string
	 */
	protected function musicOn () {
		return $this->getName() . ' music switched on';
	}

	/**
	 * @return string
	 */
	protected function takeOff () {
		return $this->getName() . ' took off';
	}

	/**
	 * @return string
	 */
	protected function landing () {
		return $this->getName() . ' landing';
	}

	/**
	 * @return string
	 */
	protected function fly () {
		return $this->getName() . ' flying';
	}

	/**
	 * @return string
	 */
	protected function swim () {
		return $this->getName() . ' swimming';
	}

	/**
	 * @param string $object
	 * @return string
	 */
	protected function load ($object) {
		$this->loadObject = $object;
		return $this->getName() . ' load ' . $object;
	}

	/**
	 * @param string $object
	 * @return string
	 */
	protected function emptyLoads ($object) {
		return $this->getName() . ' unload ' . ($object ? $object : $this->loadObject);
	}
}
