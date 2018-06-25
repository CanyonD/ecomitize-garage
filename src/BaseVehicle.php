<?php
namespace ecomitize\garage;

class BaseVehicle
{
    public const BMW                = 'bmw';
    public const KAMAZ              = 'kamaz';
    public const HARLEY_DAVIDSON    = 'harley-davidson';
    public const BOAT               = 'boat';
    public const HELICOPTER         = 'helicopter';
    public const HORSE              = 'horse';

    public const FUEL_GAS       = 'gas';
    public const FUEL_DIESEL    = 'diesel';
    public const FUEL_PETROL    = 'petrol';

    public const SUPPORTED_METHODS = array(
        BaseVehicle::BMW => array(
            'move',
            'musicOn',
            'stop',
            'refuel'
        ),
        BaseVehicle::BOAT => array(
            'swim',
            'stop',
            'refuel'
        ),
        BaseVehicle::HELICOPTER => array(
            'takeOff',
            'fly',
            'landing',
            'stop',
            'refuel'
        ),
        BaseVehicle::KAMAZ => array(
            'move',
            'stop',
            'load',
            'move',
            'stop',
            'emptyLoads',
            'stop',
            'refuel'
        ),
        BaseVehicle::HORSE => array(
            'move',
            'stop',
        )
    );
}
