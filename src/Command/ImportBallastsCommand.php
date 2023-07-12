<?php

namespace App\Command;

use App\Constants\BrandConstants;
use App\Constants\ColorTemperatureConstants;
use App\Entity\Ballast;
use App\Entity\LightSource;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class ImportBallastsCommand extends Command
{
    public function __construct(EntityManagerInterface $em) {
        $this->em = $em;

        parent::__construct();
    }

    protected function configure()
    {
        $this
            ->setName('substitube:import-ballasts')
            ->setDescription('Import ballasts from excel sheet');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $sym = new SymfonyStyle($input, $output);


//        $xlsx = \SimpleXLSX::parse('C:\\xampp\\htdocs\\\tubefinder\\import\\ballasts\\BallastDB.xlsx');
        $xlsx = \SimpleXLSX::parse('/var/www/tubefinder/import/ballasts/BallastDB.xlsx');

        if($xlsx) {
            $rows = $xlsx->rows();

            $sym->progressStart(count($rows));

            foreach ($rows as $i => $row) {


                if ($i != 0) {
                    $productName = $row[0];
                    $ean = $row[1];
                    $refNo = $row[2];
                    $lampAmount;
                    if (is_int($row[3])) {
                        $lampAmount = $row[3];
                    }
                    $brand = $row[4];
                    $compatibleLightSources = explode(',', $row[5]);
                    $incompatibleLightSources = explode(',', $row[6]);

                    $ballast = $this->em->getRepository(Ballast::class)->findOneBy(array('refNo' => $refNo));

                    if (!$ballast) {
                        $ballast = new Ballast();
                        $ballast->setRefNo($refNo);
                    }

                    $ballast->setProductName($productName);

                    if($ean != "null") {
                        $ballast->setEan($ean);
                    } else {
                        $ballast->setEan("");
                    }

                    $ballast->setBrand($brand);
                    $ballast->setLampAmount($lampAmount);

                    $this->em->persist($ballast);

                    foreach ($compatibleLightSources as $ean) {
                        $lightSource = $this->em->getRepository(LightSource::class)->findOneBy(array('ean' => $ean));

                        if($lightSource) {
                            $lightSource->addCompatibleBallast($ballast);
                            $this->em->persist($lightSource);
                        }
                    }

                    foreach ($incompatibleLightSources as $ean) {
                        $lightSource = $this->em->getRepository(LightSource::class)->findOneBy(array('ean' => $ean));

                        if($lightSource) {
                            $lightSource->addUncompatibleBallast($ballast);
                            $this->em->persist($lightSource);
                        }
                    }
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