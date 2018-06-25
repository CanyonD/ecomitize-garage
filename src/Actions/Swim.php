<?php
namespace ecomitize\garage\Actions;

use ecomitize\garage\Vehicles\Vehicle;

class Swim implements Action
{
    public function __invoke()
    {
        return function () {
            /**
             * @var Vehicle $this
             */
            return $this->getName() . ' swimming';
        };
    }
}
