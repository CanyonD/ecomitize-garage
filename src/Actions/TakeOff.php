<?php
namespace ecomitize\garage\Actions;

use ecomitize\garage\Vehicles\Vehicle;

class TakeOff implements Action
{
    public function __invoke()
    {
        return function () {
            /**
             * @var Vehicle $this
             */
            return $this->getName() . ' took off';
        };
    }
}
