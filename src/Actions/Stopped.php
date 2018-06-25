<?php
namespace ecomitize\garage\Actions;

use ecomitize\garage\Vehicles\Vehicle;

class Stopped implements Action
{
    public function __invoke()
    {
        return function () {
            /**
             * @var Vehicle $this
             */
            return $this->getName() . ' stopped';
        };
    }
}
