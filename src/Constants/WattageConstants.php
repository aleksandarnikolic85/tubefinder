<?php

namespace App\Constants;

class WattageConstants
{
    const WATTAGE_1 = 1;
    const WATTAGE_2 = 2;
    const WATTAGE_3 = 3;
    const WATTAGE_4 = 4;
    const WATTAGE_5 = 5;
    const WATTAGE_6 = 6;
    const WATTAGE_7 = 7;
    const WATTAGE_8 = 8;
    const WATTAGE_9 = 9;
    const WATTAGE_10 = 10;
    const WATTAGE_11 = 11;
    const WATTAGE_12 = 12;
    const WATTAGE_13 = 13;
    const WATTAGE_14 = 14;
    const WATTAGE_15 = 15;
    const WATTAGE_16 = 16;
    const WATTAGE_17 = 17;
    const WATTAGE_18 = 18;
    const WATTAGE_19 = 19;
    const WATTAGE_20 = 20;
    const WATTAGE_21 = 21;
    const WATTAGE_22 = 22;
    const WATTAGE_23 = 23;
    const WATTAGE_24 = 24;
    const WATTAGE_25 = 25;
    const WATTAGE_26 = 26;
    const WATTAGE_27 = 27;
    const WATTAGE_28 = 28;
    const WATTAGE_29 = 29;
    const WATTAGE_30 = 30;
    const WATTAGE_31 = 31;
    const WATTAGE_32 = 32;
    const WATTAGE_33 = 33;
    const WATTAGE_34 = 34;
    const WATTAGE_35 = 35;
    const WATTAGE_36 = 36;
    const WATTAGE_37 = 37;
    const WATTAGE_38 = 38;
    const WATTAGE_39 = 39;
    const WATTAGE_40 = 40;


    static private $constants = array(
        self::WATTAGE_1 => '5.4 W',
        self::WATTAGE_2 => '6.6 W',
        self::WATTAGE_3 => '6.7 W',
        self::WATTAGE_4 => '6.8 W',
        self::WATTAGE_5 => '7 W',
        self::WATTAGE_6 => '7.3 W',
        self::WATTAGE_7 => '7.5 W',
        self::WATTAGE_8 => '7.9 W',
        self::WATTAGE_9 => '8 W',
        self::WATTAGE_10 => '10 W',
        self::WATTAGE_11 => '10.3 W',
        self::WATTAGE_12 => '11.3 W',
        self::WATTAGE_13 => '11.6 W',
        self::WATTAGE_14 => '12 W',
        self::WATTAGE_15 => '12.1 W',
        self::WATTAGE_16 => '12.7 W',
        self::WATTAGE_17 => '13.1 W',
        self::WATTAGE_18 => '14 W',
        self::WATTAGE_19 => '14.3 W',
        self::WATTAGE_20 => '14.9 W',
        self::WATTAGE_21 => '15 W',
        self::WATTAGE_22 => '15.6 W',
        self::WATTAGE_23 => '16 W',
        self::WATTAGE_24 => '16.4 W',
        self::WATTAGE_25 => '17 W',
        self::WATTAGE_26 => '17.9 W',
        self::WATTAGE_27 => '18 W',
        self::WATTAGE_28 => '18.3 W',
        self::WATTAGE_29 => '18.8 W',
        self::WATTAGE_30 => '19 W',
        self::WATTAGE_31 => '19.3 W',
        self::WATTAGE_32 => '20 W',
        self::WATTAGE_33 => '20.6 W',
        self::WATTAGE_34 => '21.1 W',
        self::WATTAGE_35 => '23 W',
        self::WATTAGE_36 => '23.1 W',
        self::WATTAGE_37 => '23.4 W',
        self::WATTAGE_38 => '24 W',
        self::WATTAGE_39 => '26 W',
        self::WATTAGE_40 => '37 W',
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