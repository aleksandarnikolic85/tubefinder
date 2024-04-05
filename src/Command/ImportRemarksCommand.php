<?php

namespace App\Command;

use App\Entity\Admin;
use App\Entity\Ballast;
use App\Entity\LightSource;
use App\Entity\Remarks;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class ImportRemarksCommand extends Command
{
    public function __construct(EntityManagerInterface $em) {
        $this->em = $em;

        parent::__construct();
    }

    protected function configure()
    {
        $this
            ->setName('substitube:import-remarks')
            ->setDescription('Import remarks');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {

        $sym = new SymfonyStyle($input, $output);

//                $xlsx = \SimpleXLSX::parse('C:\\xampp\\htdocs\\tubefinder\\import\\remarks\\RemarksDB.xlsx');
        $xlsx = \SimpleXLSX::parse('/var/www/tubefinder/import/remarks/RemarksDB.xlsx');

        if($xlsx) {
            $rows = $xlsx->rows();

            $sym->progressStart(count($rows));

            foreach ($rows as $i => $row) {
                if ($i != 0) {
                    $lightSourceGTIN = $row[0];
                    $ballastName = $row[1];
                    $refNo = $row[2];
                    $lampAmount = $row[3];
                    $en = $row[4];
                    $de = $row[5];
                    $nl = $row[6];
                    $fr = $row[7];
                    $pt = $row[8];
                    $es = $row[9];
                    $it = $row[10];
                    $da = $row[11];
                    $no = $row[12];
                    $sv = $row[13];
                    $fi = $row[14];
                    $et = $row[15];
                    $lt = $row[16];
                    $lv = $row[17];

                    $lightSource = $this->em->getRepository(LightSource::class)->findOneBy(array('ean' => $lightSourceGTIN));
                    $ballast = $this->em->getRepository(Ballast::class)->findOneBy(array('refNo' => $refNo, 'lampAmount' => $lampAmount, 'productName' => $ballastName));

                    if($lightSource and $ballast) {
                        $remark = new Remarks();

                        $remark->setLightSource($lightSource);
                        $remark->setBallast($ballast);

                        $remark->setEn($en);
                        $remark->setDe($de);
                        $remark->setNl($nl);
                        $remark->setFr($fr);
                        $remark->setPt($pt);
                        $remark->setEs($es);
                        $remark->setIt($it);
                        $remark->setDa($da);
                        $remark->setNo($no);
                        $remark->setSv($sv);
                        $remark->setFi($fi);
                        $remark->setEt($et);
                        $remark->setLt($lt);
                        $remark->setLv($lv);

                        $this->em->persist($remark);
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