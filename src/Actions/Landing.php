<?php
namespace ecomitize\garage\Actions;

use ecomitize\garage\Vehicles\Vehicle;

class Landing implements Action
{
    public function __invoke()
    {
        return function () {
            /**
             * @var Vehicle $this
             */
            return $this->getName() . ' landing';
        };
    }
}
