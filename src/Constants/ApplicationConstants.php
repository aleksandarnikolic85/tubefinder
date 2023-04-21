<?php

namespace App\Constants;

class ApplicationConstants
{
    const APPLICATION_INDUSTRY = 1;
    const APPLICATION_WAREHOUSE = 2;
    const APPLICATION_CAR_PARK = 3;
    const APPLICATION_RETAIL = 4;
    const APPLICATION_FOOD_DISPLAY = 5;
    const APPLICATION_OFFICE = 6;
    const APPLICATION_RESIDENTIAL = 7;
    const APPLICATION_OUTDOOR = 8;
    const APPLICATION_PUBLIC_BUILDING  = 9;


    static private $constants = array(
        self::APPLICATION_INDUSTRY => '$.application.industry',
        self::APPLICATION_WAREHOUSE => '$.application.warehouse',
        self::APPLICATION_CAR_PARK => '$.application.car_park',
        self::APPLICATION_RETAIL => '$.application.retail',
        self::APPLICATION_FOOD_DISPLAY => '$.application.food_display',
        self::APPLICATION_OFFICE => '$.application.office',
        self::APPLICATION_RESIDENTIAL => '$.application.residential',
        self::APPLICATION_OUTDOOR => '$.application.outdoor',
        self::APPLICATION_PUBLIC_BUILDING => '$.application.public_building',

    );

    static public function getConstants()
    {
        return self::$constants;
    }

    static public function getConstantsById($id)
    {
        return self::$constants[$id];
    }

}