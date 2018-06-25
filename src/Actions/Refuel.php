<?php
namespace ecomitize\garage\Actions;

use ecomitize\garage\Vehicles\Vehicle;

class Refuel implements Action
{
    public function __invoke()
    {
        return function ($fuel = null) {
            /**
             * @var Vehicle $this
             */
            return $this->getName() . ' refuel ' . ($fuel ? $fuel : $this->getFuel());
        };
    }
}
