<?php

namespace App\Constants;

class LengthConstants
{
    const LENGTH_1 = 1;
    const LENGTH_2 = 2;
    const LENGTH_3 = 3;
    const LENGTH_4 = 4;
    const LENGTH_5 = 5;
    const LENGTH_6 = 6;
    const LENGTH_7 = 7;
    const LENGTH_8 = 8;
    const LENGTH_9 = 9;
    const LENGTH_10 = 10;
    const LENGTH_11 = 11;
    const LENGTH_12 = 12;
    const LENGTH_13 = 13;
    const LENGTH_14 = 14;
    const LENGTH_15 = 15;
    const LENGTH_16 = 16;
    const LENGTH_17 = 17;
    const LENGTH_18 = 18;
    const LENGTH_19 = 19;
    const LENGTH_20 = 20;
    const LENGTH_21 = 21;
    const LENGTH_22 = 22;

    static private $constants = array(
        self::LENGTH_1 => '205.00 mm',
        self::LENGTH_2 => '212.00 mm',
        self::LENGTH_3 => '298.00 mm',
        self::LENGTH_4 => '300.00 mm',
        self::LENGTH_5 => '450.00 mm',
        self::LENGTH_6 => '549.00 mm',
        self::LENGTH_7 => '600.00 mm',
        self::LENGTH_8 => '603.00 mm',
        self::LENGTH_9 => '604.00 mm',
        self::LENGTH_10 => '849.00 mm',
        self::LENGTH_11 => '908.00 mm',
        self::LENGTH_12 => '1060.00 mm',
        self::LENGTH_13 => '1061.00 mm',
        self::LENGTH_14 => '1149.00 mm',
        self::LENGTH_15 => '1200.00 mm',
        self::LENGTH_16 => '1212.00 mm',
        self::LENGTH_17 => '1212.50 mm',
        self::LENGTH_18 => '1213.00 mm',
        self::LENGTH_19 => '1449.00 mm',
        self::LENGTH_20 => '1500.00 mm',
        self::LENGTH_21 => '1513.00 mm',
        self::LENGTH_22 => '1513.10 mm',
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