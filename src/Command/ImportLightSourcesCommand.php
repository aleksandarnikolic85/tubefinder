<?php

namespace App\Command;

use App\Constants\ColorTemperatureConstants;
use App\Constants\EfficiencyConstants;
use App\Constants\GuaranteeTypeConstants;
use App\Constants\LampTypeConstants;
use App\Constants\LengthConstants;
use App\Constants\LifetimeConstants;
use App\Constants\WattageConstants;
use App\Entity\LightSource;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class ImportLightSourcesCommand extends Command
{
    public function __construct(EntityManagerInterface $em) {
        $this->em = $em;

        parent::__construct();
    }

    protected function configure()
    {
        $this
            ->setName('substitube:import-lights')
            ->setDescription('Import light sources from Pimcore');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $sym = new SymfonyStyle($input, $output);
//        $xlsx = \SimpleXLSX::parse('C:\\xampp\\htdocs\\substitube\\import\\lightsources\\lightsDBpimcore.xlsx');
        $xlsx = \SimpleXLSX::parse('/var/www/tubefinder/import/lightsources/lightsDBpimcore.xlsx');

        if($xlsx) {
            $rows = $xlsx->rows();
            $sym->progressStart(count($rows));

            foreach ($rows as $i => $row) {


                if ($i != 0) {

                    $ean = $row[0];
                    $productName = $row[1];
                    $basicCode = $row[2];
                    $shatterProtection = $row[3];
                    $lowFlicker = $row[4];
                    $power = $row[5];
                    $lumen = $row[6];
                    $lifetime = $row[7];
                    $lifetimeRem = $row[8];
                    $efficiencyClass = $row[9];
                    $guarantee = $row[10];
                    $guaranteeRem = $row[11];
                    $colorTemperature = $row[12];
                    $length = $row[13];
                    $lampType = $row[14];
                    $applications = $row[15];
                    $scenario = $row[16];

                    $lightSource = $this->em->getRepository(LightSource::class)->findOneBy(array('ean' => $ean));

                    if (!$lightSource) {
                        $lightSource = new LightSource();
                        $lightSource->setEan($ean);
                    }

                    $lightSource->setProductName($productName);

                    if($basicCode) {
                        $lightSource->setBasicCode($basicCode);
                    }


                    if($power) {
                        $powerConstants = WattageConstants::getConstants();

                        foreach ($powerConstants as $key => $value) {
                            if($value == $power) {
                                $lightSource->setPower($key);
                            }
                        }
                    }

                    $lumenFormatted = null;
                    if($lumen) {
                        $lumenFormatted = str_replace(" lm","",$lumen);
                    }

                    $lightSource->setLuminousFlux($lumenFormatted);

//                    $colorTemperatureFormatted = null;
//                    if($colorTemperature) {
//                        $colorTemperatureFormatted = str_replace(" K","",$colorTemperature);
//                    }
//
//                    $lightSource->setColorTemperature(ColorTemperatureConstants::getConstantsById($colorTemperatureFormatted));

                    if($colorTemperature) {
                        $colorTemperatureConstants = ColorTemperatureConstants::getConstants();

                        foreach ($colorTemperatureConstants as $key => $value) {
                            if($value == $colorTemperature) {
                                $lightSource->setColorTemperature($key);
                            }
                        }
                    }


                    if($shatterProtection) {
                        if($shatterProtection == "Yes") {
                            $lightSource->setShatterproof(true);
                        } else {
                            $lightSource->setShatterproof(false);
                        }
                    }

                    if($lowFlicker == "Yes") {
                        $lightSource->setLowFLickerLight(true);
                    }

//                    $garanteeFormatted = null;

                    if($guarantee) {
                        $garanteeFormatted = str_replace(" years","", $guarantee);

                        $guaranteeConstants = GuaranteeTypeConstants::getConstants();

                        foreach ($guaranteeConstants as $key => $value) {
                            if ($key == $garanteeFormatted) {
                                $lightSource->setGuarantee($key);
                            }
                        }
                    }

//                    $lightSource->setGuarantee($garanteeFormatted);

                    if ($lifetime) {
                        $lifetimeConstants = LifetimeConstants::getConstants();

                        foreach ($lifetimeConstants as $key => $value) {
                            if($value == $lifetime) {
                                $lightSource->setLifetime($key);
                            }
                        }
                    }

//                    if($lifetimeRem) {
//                        $lightSource->setLifetimeRem($lifetimeRem);
//                    } else {
//                        $lightSource->setLifetimeRem(null);
//                    }

                    $lightSource->setLifetimeRem("L70/B50");


                    $applicationsFormatted = array();

                    if($applications) {
                        $applicationsFormatted = explode(',', $applications);
                    }

                    if($efficiencyClass) {
                        $efficiencyConstants = EfficiencyConstants::getConstants();

                        foreach ($efficiencyConstants as $key => $value) {
                            if($value == $efficiencyClass) {
                                $lightSource->setEfficiencyClass($key);
                            }
                        }
                    } else {
                        $lightSource->setEfficiencyClass(null);
                    }

                    if($guaranteeRem) {
                        $lightSource->setGuaranteeRem($guaranteeRem);
                    } else {
                        $lightSource->setGuaranteeRem(null);
                    }

//                    $lengthFormatted = null;
//
//                    if($length) {
//                        $lengthFormatted = str_replace(" mm","", $length);
//                    }

                    if($length) {
                        $lengthConstants = LengthConstants::getConstants();

                        foreach ($lengthConstants as $key => $value) {
                            if($value == $length) {
                                $lightSource->setLength($key);
                            }
                        }
                    }

                    if($lampType) {

                        $lampTypeConstants = LampTypeConstants::getConstants();

                        foreach ($lampTypeConstants as $key => $value) {
                            if ($value == $lampType) {
                                $lightSource->setLampType($key);
                            }
                        }

                    } else {
                        $lightSource->setLampType(null);
                    }

                    if($scenario) {
                        $lightSource->setScenario($scenario);
                    }


                    $lightSource->setCompatibleApplications($applicationsFormatted);


                    $this->em->persist($lightSource);

                }
                $sym->progressAdvance();
            }

            $this->em->flush();
        } else {
            print "There is no file for import!";
        }

        $sym->progressFinish();
        return Command::SUCCESS;
    }
}