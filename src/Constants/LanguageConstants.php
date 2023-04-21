<?php

namespace App\Constants;

class LanguageConstants
{
    const LANGUAGE_EN = 'en'; // English
    const LANGUAGE_DE = 'de'; // German
    const LANGUAGE_NL = 'nl'; // Dutch
    const LANGUAGE_FR = 'fr'; // French
//    const LANGUAGE_PT = 'pt'; // Portuguese
    const LANGUAGE_ES = 'es'; // Spanish
    const LANGUAGE_IT = 'it'; // Italian
    const LANGUAGE_DA = 'da'; // Danish
//    const LANGUAGE_NO = 'no'; // Norwegian
    const LANGUAGE_SV = 'sv'; // Swedish
    const LANGUAGE_FI = 'fi'; // Finnish
//    const LANGUAGE_ET = 'et'; // Estonian
//    const LANGUAGE_LT = 'lt'; // Lithuanian
//    const LANGUAGE_LV = 'lv'; // Latvian



    static private $constants = array(
        self::LANGUAGE_EN => 'English',
        self::LANGUAGE_DE => 'Deutsch',
        self::LANGUAGE_NL => 'Nederlands',
        self::LANGUAGE_FR => 'français',
//        self::LANGUAGE_PT => 'Português',
        self::LANGUAGE_ES => 'Español',
        self::LANGUAGE_IT => 'Italiano',
        self::LANGUAGE_DA => 'Dansk',
//        self::LANGUAGE_NO => 'Norsk',
        self::LANGUAGE_SV => 'Svenska',
        self::LANGUAGE_FI => 'Suomi',
//        self::LANGUAGE_ET => 'Eesti',
//        self::LANGUAGE_LT => 'Lietuvių',
//        self::LANGUAGE_LV => 'Latviešu',
    );

    static public function getLanguageConstants()
    {
        return self::$constants;
    }

    static public function getLanguageConstantsByLanguageCode($code)
    {
        return self::$constants[$code];
    }
}