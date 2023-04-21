<?php

namespace App\Controller\Admin;

use App\Constants\BrandConstants;
use App\Constants\ColorTemperatureConstants;
use App\Constants\EfficiencyConstants;
use App\Constants\GuaranteeTypeConstants;
use App\Constants\LampTypeConstants;
use App\Constants\LengthConstants;
use App\Constants\LifetimeConstants;
use App\Constants\ScenarioConstants;
use App\Constants\WattageConstants;
use App\Entity\LightSource;
use App\Constants\ApplicationConstants;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Assets;

class LightSourceCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return LightSource::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('ean'),
            TextField::new('basicCode'),
            TextField::new('productName'),
            ChoiceField::new('power')->setChoices((array_flip(WattageConstants::getConstants()))),
            NumberField::new('luminousFlux'),
            ChoiceField::new('colorTemperature')->setChoices(array_flip(ColorTemperatureConstants::getConstants())),
            BooleanField::new('shatterproof'),
            BooleanField::new('lowFlickerLight'),
            ChoiceField::new('guarantee')->setChoices(array_flip(GuaranteeTypeConstants::getConstants())),
            TextField::new('guarantee_rem'),
            ChoiceField::new('lifetime')->setChoices(array_flip(LifetimeConstants::getConstants())),
            ChoiceField::new('efficiencyClass')->setChoices(array_flip(EfficiencyConstants::getConstants())),
            ChoiceField::new('length')->setChoices(array_flip(LengthConstants::getConstants())),
            ChoiceField::new('lamp_type')->setChoices(array_flip(LampTypeConstants::getConstants())),
            ChoiceField::new('compatibleApplications')->setChoices(array_flip(ApplicationConstants::getConstants()))->allowMultipleChoices(),
            AssociationField::new('compatibleBallasts')->autocomplete(),
            AssociationField::new('uncompatibleBallasts')->setFormTypeOptions(['by_reference' => false])->autocomplete(),
            ChoiceField::new('scenario')->setChoices(ScenarioConstants::getConstants()),
        ];
    }

    public function configureAssets(Assets $assets): Assets
    {
        return $assets
            ->addCssFile('assets/css/admin.css');
    }

}
