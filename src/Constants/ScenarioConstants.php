<?php

namespace App\Constants;

class ScenarioConstants
{
    const SCENARIO_CONNECTED = 'CONNECTED';
    const SCENARIO_EM = 'EM';
    const SCENARIO_T8UNIVERSAL = 'T8U';
    const SCENARIO_HF = 'HF';
    const SCENARIO_T5UNIVERSAL = 'T5U';
    const SCENARIO_AC = 'AC';


    static private $constants = array(
        self::SCENARIO_CONNECTED => 'CONNECTED',
        self::SCENARIO_EM => 'EM',
        self::SCENARIO_T8UNIVERSAL => 'T8U',
        self::SCENARIO_HF => 'HF',
        self::SCENARIO_T5UNIVERSAL => 'T5U',
        self::SCENARIO_AC => 'AC',
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