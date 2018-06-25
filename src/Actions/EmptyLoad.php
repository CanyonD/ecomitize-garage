<?php
namespace ecomitize\garage\Actions;

use ecomitize\garage\Vehicles\Vehicle;

class EmptyLoad implements Action
{
    public function __invoke()
    {
        return function ($object) {
            /**
             * @var Vehicle $this
             */
            return $this->getName() . ' unload ' . ($object ? $object : $this->getObject());
        };
    }
}
