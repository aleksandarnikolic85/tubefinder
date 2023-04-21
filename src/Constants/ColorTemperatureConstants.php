<?php

namespace App\Constants;

class ColorTemperatureConstants
{
    const COLOR_TEMPERATURE_1 = 1;
    const COLOR_TEMPERATURE_2 = 2;
    const COLOR_TEMPERATURE_3 = 3;
    const COLOR_TEMPERATURE_4 = 4;


    static private $constants = array(
        self::COLOR_TEMPERATURE_1 => '3000 K',
        self::COLOR_TEMPERATURE_2 => '3300 K',
        self::COLOR_TEMPERATURE_3 => '4000 K',
        self::COLOR_TEMPERATURE_4 => '6500 K',

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