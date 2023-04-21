<?php

namespace App\Twig;

use App\Constants\ColorTemperatureConstants;
use App\Constants\EfficiencyConstants;
use App\Constants\GuaranteeTypeConstants;
use App\Constants\LampTypeConstants;
use App\Constants\LanguageConstants;
use App\Constants\LengthConstants;
use App\Constants\LifetimeConstants;
use App\Constants\WattageConstants;
use App\Entity\Remarks;
use Doctrine\ORM\EntityManager;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;
use App\Constants\ApplicationConstants;
use Symfony\Contracts\Translation\TranslatorInterface;
use Doctrine\ORM\EntityManagerInterface;

class AppExtension extends AbstractExtension
{
    /**
     * @var TranslatorInterface $translator
     */
    private $translator;
    protected $em;

    public function __construct(TranslatorInterface $translator, EntityManagerInterface $em)
    {
        $this->translator = $translator;
        $this->em = $em;
    }

    public function getFunctions()
    {
        return array(
            new TwigFunction('compatibleApplicationName', array($this, 'compatibleApplicationName')),
            new TwigFunction('getAvailableLanguages', array($this, 'getAvailableLanguages')),
            new TwigFunction('findLanguageName', array($this, 'findLanguageName')),
            new TwigFunction('getLampTypes', array($this, 'getLampTypes')),
            new TwigFunction('findColorTemperature', array($this, 'findColorTemperature')),
            new TwigFunction('findLifetime', array($this, 'findLifetime')),
            new TwigFunction('findGuarantee', array($this, 'findGuarantee')),
            new TwigFunction('findWattage', array($this, 'findWattage')),
            new TwigFunction('findEEK', array($this, 'findEEK')),
            new TwigFunction('findLength', array($this, 'findLength')),
            new TwigFunction('findLampType', array($this, 'findLampType')),
            new TwigFunction('checkRemarks', array($this, 'checkRemarks')),
            new TwigFunction('getEEKIcon', array($this, 'getEEKIcon')),
        );
    }

    public function compatibleApplicationName($apps)
    {
        $appsNames = "";

        $i = 0;
        $len = count($apps);

        foreach ($apps as $app) {
           if($i == $len - 1) {
               $appsNames.= $this->translator->trans(ApplicationConstants::getConstantsById($app));
           } else {
               $appsNames.= $this->translator->trans(ApplicationConstants::getConstantsById($app)) . ", ";
           }
           $i++;
        }

        return $appsNames;
    }

    public function getAvailableLanguages()
    {
        return LanguageConstants::getLanguageConstants();
    }

    public function findLanguageName($code)
    {
        return LanguageConstants::getLanguageConstantsByLanguageCode($code);
    }

    public function getLampTypes()
    {
        return LampTypeConstants::getConstants();
    }

    public function findColorTemperature($id)
    {
        return ColorTemperatureConstants::getConstantsById($id);
    }

    public function findLifetime($id)
    {
        return LifetimeConstants::getConstantsById($id);
    }

    public function findGuarantee($id)
    {
        return GuaranteeTypeConstants::getConstantsById($id);
    }

    public function findWattage($id)
    {
        return WattageConstants::getConstantsById($id);
    }

    public function findEEK($id)
    {
        return EfficiencyConstants::getConstantsById($id);
    }

    public function findLength($id, $locale)
    {
        $const = LengthConstants::getConstantsById($id);
        if ($locale != 'en') {
            $const = str_replace('.',',', $const);
        }
        return $const;
    }

    public function findLampType($id)
    {
        return LampTypeConstants::getConstantsById($id);
    }

    public function checkRemarks($lightSource, $ballast, $locale)
    {
        $result = $this->em->getRepository(Remarks::class)->findOneBy(array('light_source' => $lightSource, 'ballast' => $ballast));

        if($result) {
            if($locale == "en") {
                return $result->getEn();
            } elseif ($locale == 'de') {
                return $result->getDe();
            } elseif ($locale == 'nl') {
                return $result->getNl();
            } elseif ($locale == 'fr') {
                return $result->getFr();
            } elseif ($locale == 'pt') {
                return $result->getPt();
            } elseif ($locale == 'es') {
                return $result->getEs();
            } elseif ($locale == 'it') {
                return $result->getIt();
            } elseif ($locale == 'da') {
                return $result->getDa();
            } elseif ($locale == 'no') {
                return $result->getNo();
            } elseif ($locale == 'sv') {
                return $result->getSv();
            } elseif ($locale == 'fi') {
                return $result->getFi();
            } elseif ($locale == 'et') {
                return $result->getEt();
            } elseif ($locale == 'lt') {
                return $result->getLt();
            } elseif ($locale == 'lv') {
                return $result->getLv();
            }
        }

        return null;
    }

    public function getEEKIcon($eek)
    {
        if($eek == "A") {
            $path = '/assets/images/arrow_A_right.jpg';
        } elseif ($eek == "B") {
            $path = '/assets/images/arrow_B_right.jpg';
        } elseif ($eek == "C") {
            $path = '/assets/images/arrow_C_right.jpg';
        } elseif ($eek == "D") {
            $path = '/assets/images/arrow_D_right.jpg';
        } elseif ($eek == "E") {
            $path = '/assets/images/arrow_E_right.jpg';
        } elseif ($eek == "F") {
            $path = '/assets/images/arrow_F_right.jpg';
        } elseif ($eek == "G") {
            $path = '/assets/images/arrow_G_right.jpg';
        } else {
            return null;
        }

        return $path;
    }

}
