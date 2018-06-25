<?php
namespace ecomitize\garage\Actions;

class Move implements Action
{
    /**
     * @var string $name
     */
    private $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function get()
    {
        return $this->name . ' moving';
    }
}
