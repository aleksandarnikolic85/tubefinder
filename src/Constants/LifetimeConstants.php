<?php

namespace App\Constants;

class LifetimeConstants
{
    const LIFETIME_1 = 1;
    const LIFETIME_2 = 2;
    const LIFETIME_3 = 3;
    const LIFETIME_4 = 4;


    static private $constants = array(
        self::LIFETIME_1 => '30000 h',
        self::LIFETIME_2 => '50000 h',
        self::LIFETIME_3 => '60000 h',
        self::LIFETIME_4 => '75000 h',
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