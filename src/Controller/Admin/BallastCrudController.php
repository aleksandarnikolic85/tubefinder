<?php

namespace App\Controller\Admin;

use App\Entity\Ballast;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use App\Constants\BrandConstants;

class BallastCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Ballast::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            ChoiceField::new('brand')->setChoices(BrandConstants::getConstants()),
            TextField::new('productName'),
            TextField::new('ean'),
            TextField::new('refNo'),
            NumberField::new('lampAmount'),
//            AssociationField::new('compatibleLightSources'),
        ];
    }

}
