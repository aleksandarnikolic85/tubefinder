<?php

namespace App\Controller\Admin;

use App\Entity\Admin;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\Security\Core\User\PasswordUpgraderInterface;

class AdminCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Admin::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            EmailField::new('email')->setPermission('ROLE_ADMIN'),
            TextField::new('name')->setPermission('ROLE_ADMIN'),
            TextField::new('surname')->setPermission('ROLE_ADMIN'),
            TextField::new('password')->setPermission('ROLE_ADMIN'),
        ];
    }
}
