<?php
namespace unit\ecomitize\garage;

use ecomitize\garage\Vehicle;
use PHPUnit\Framework\TestCase;

class MainTest extends TestCase {
	/**
	 * @var string tmpName
	 */
	private $tmpName;
	/**
	 * @var Vehicle tmpClass
	 */
	private $tmpClass;

	public function setUp() {
		$length = 10;
		$range = array_merge(
			range(0,9),
			range('a', 'z'),
			range('A', 'Z')
		);
		$this->tmpName = substr(
			str_shuffle(
				str_repeat(
					$range, ceil($length/strlen($range))
				)
			),
			1,
			$length
		);
		$this->tmpClass = new Vehicle($this->tmpName);
	}

	public function tearDown() {
		$this->tmpClass = null;
	}

	public function testClassVehicle () : void {
		$this->assertEquals(get_class($this->tmpClass), 'ecomitize\garage\Vehicle');
		$this->assertEquals($this->tmpClass->getName(), $this->tmpName);
	}
}
