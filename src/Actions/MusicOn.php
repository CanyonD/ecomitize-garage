<?php
namespace ecomitize\garage\Actions;

use ecomitize\garage\Vehicles\Vehicle;

class MusicOn implements Action
{
//    /**
//     * @var string $name
//     */
//    private $name;
//
//    public function __construct($name)
//    {
//        $this->name = $name;
//    }
//
//    public function get()
//    {
//        return $this->name . ' music switched on';
//    }

    public function __invoke()
    {
        return function () {
            /**
             * @var Vehicle $this
             */
            return $this->getName() . ' music switched on';
        };
    }
}
