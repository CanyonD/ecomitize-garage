<?php
namespace ecomitize\garage\Actions;

use ecomitize\garage\Vehicles\Vehicle;

class Load implements Action
{
    public function __invoke()
    {
        return function ($object) {
            /**
             * @var Vehicle $this
             */
            $this->setObject($object);
            return $this->getName() . ' load ' . $object;
        };
    }
}
