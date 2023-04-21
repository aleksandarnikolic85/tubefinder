<?php

namespace App\Constants;

class EfficiencyConstants
{
    const EFFICIENCY_1 = 1;
    const EFFICIENCY_2 = 2;
    const EFFICIENCY_3 = 3;
    const EFFICIENCY_4 = 4;
    const EFFICIENCY_5 = 5;
    const EFFICIENCY_6 = 6;
    const EFFICIENCY_7 = 7;
    const EFFICIENCY_8 = 8;
    const EFFICIENCY_9 = 9;


    static private $constants = array(
        self::EFFICIENCY_1 => 'A++',
        self::EFFICIENCY_2 => 'A+',
        self::EFFICIENCY_3 => 'A',
        self::EFFICIENCY_4 => 'B',
        self::EFFICIENCY_5 => 'C',
        self::EFFICIENCY_6 => 'D',
        self::EFFICIENCY_7 => 'E',
        self::EFFICIENCY_8 => 'F',
        self::EFFICIENCY_9 => 'G',
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