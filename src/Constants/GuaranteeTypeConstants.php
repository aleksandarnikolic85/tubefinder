<?php

namespace App\Constants;

class GuaranteeTypeConstants
{
    const GUARANTEE_TYPE_1 = 3;
    const GUARANTEE_TYPE_2 = 5;


    static private $constants = array(
        self::GUARANTEE_TYPE_1 => '$.guarantee.three_years',
        self::GUARANTEE_TYPE_2 => '$.guarantee.five_years',

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