<?php

namespace App\Constants;

class BrandConstants
{
    const BRAND_OSRAM = 'OSRAM';
    const BRAND_PHILIPS = 'PHILIPS';
    const BRAND_HELVAR = 'HELVAR';
    const BRAND_TRIDONIC = 'TRIDONIC';
    const BRAND_VS = 'Vossloh Schwabe';
    const BRAND_BAG = 'BAG';
    const BRAND_BTL = 'BTL';
    const BRAND_HEP = 'HEP';
    const BRAND_ABB = 'ABB';
    const BRAND_TCI = 'TCI';

    static private $constants = array(

      self::BRAND_OSRAM => 'OSRAM',
      self::BRAND_PHILIPS => 'PHILIPS',
      self::BRAND_HELVAR => 'HELVAR',
      self::BRAND_TRIDONIC => 'TRIDONIC',
      self::BRAND_VS => 'Vossloh Schwabe',
      self::BRAND_BAG => 'BAG',
      self::BRAND_BTL => 'BTL',
      self::BRAND_HEP => 'HEP',
      self::BRAND_ABB => 'ABB',
      self::BRAND_TCI => 'TCI',
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