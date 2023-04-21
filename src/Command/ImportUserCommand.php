<?php

namespace App\Command;

use App\Constants\BrandConstants;
use App\Constants\ColorTemperatureConstants;
use App\Entity\Admin;
use App\Entity\Ballast;
use App\Entity\LightSource;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class ImportUserCommand extends Command
{
    public function __construct(EntityManagerInterface $em) {
        $this->em = $em;

        parent::__construct();
    }

    protected function configure()
    {
        $this
            ->setName('substitube:import-user')
            ->setDescription('Import user');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $user = new Admin();
        $user->setEmail('a.nikolic@ledvance.com');
        $user->setPassword('$2y$13$jSCQxLjUHeAFJxLQdD7TMeqQ9GZ22hQ9tITMgb/1IKpvEM8ou3cPm');
        $user->setRoles(['ROLE_ADMIN']);
        $user->setName("Aleksandar");
        $user->setSurname("Nikolić");
        $user->setActive(true);

//        $user->setEmail('user@user.de');
//        $user->setPassword('$2y$13$jSCQxLjUHeAFJxLQdD7TMeqQ9GZ22hQ9tITMgb/1IKpvEM8ou3cPm');
//        $user->setRoles(['ROLE_USER']);
//        $user->setName('User');
//        $user->setSurname('Userich');

        $this->em->persist($user);
        $this->em->flush();

        return Command::SUCCESS;
    }
}