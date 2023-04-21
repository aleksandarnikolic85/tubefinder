<?php

namespace App\Constants;

class LampTypeConstants
{
    const LAMP_TYPE_1 = 1;
    const LAMP_TYPE_2 = 2;
    const LAMP_TYPE_3 = 3;


    static private $constants = array(
        self::LAMP_TYPE_1 => 'T5',
        self::LAMP_TYPE_2 => 'T8',
        self::LAMP_TYPE_3 => 'T9',
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