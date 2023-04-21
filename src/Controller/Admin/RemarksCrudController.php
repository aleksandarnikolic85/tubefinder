<?php

namespace App\Controller\Admin;

use App\Entity\Remarks;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class RemarksCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Remarks::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            AssociationField::new('light_source'),
            AssociationField::new('ballast'),
            TextareaField::new('en'),
            TextareaField::new('de'),
            TextareaField::new('nl'),
            TextareaField::new('fr'),
            TextareaField::new('pt'),
            TextareaField::new('es'),
            TextareaField::new('it'),
            TextareaField::new('da'),
            TextareaField::new('no'),
            TextareaField::new('sv'),
            TextareaField::new('fi'),
            TextareaField::new('et'),
            TextareaField::new('lt'),
            TextareaField::new('lv'),
        ];
    }

}
