<?php

namespace App\Controller\Ajax;

use App\Constants\ColorTemperatureConstants;
use App\Constants\LampTypeConstants;
use App\Constants\LengthConstants;
use App\Constants\WattageConstants;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Ballast;
use App\Entity\LightSource;
use Symfony\Contracts\Translation\TranslatorInterface;

class AdvancedSearchController extends AbstractController
{
    /**
     * @Route("/{_locale}/ajax/advanced_search", name="advanced_search")
     */
    public function index(TranslatorInterface $trans)
    {
        $em = $this->getDoctrine()->getManager();
        $lampType = $_POST['lampType'];
        $length = $_POST['length'];
        $wattage = $_POST['wattage'];
        $colorTemperature = $_POST['colorTemperature'];

//        dump($lampType);

        $results = $em->getRepository(LightSource::class)->advancedSearch($lampType, $length, $wattage, $colorTemperature);

        $noOfLightSources = count($results);

        $lampTypeHtml = "<option value=''  selected>" . $trans->trans('$.search_form.lamp_type') ."</option>";
        $lengthHtml = "<option value=''  selected>" . $trans->trans('$.search_form.length') ."</option>";
        $wattageHtml = "<option value=''  selected>" . $trans->trans('$.search_form.wattage') ."</option>";
        $colorTemperatureHtml = "<option value=''  selected>" . $trans->trans('$.search_form.color_temperature') ."</option>";

        if($results) {
            $html = $this->renderView('home/result_list.html.twig', array(
                'lightSources' => $results,
                'ballasts' => array(),
                'noOfBallasts' => 0,
                'noOfLightSources' => $noOfLightSources,
                'noResults' => false
            ));

            $lampTypeAttributes = array();
            $lengthAttributes = array();
            $wattageAttributes = array();
            $colorTemperatureAttributes = array();

            foreach ($results as $result) {
                $keyLampType = $result->getLampType();
                $keyLength = $result->getLength();
                $keyWattage = $result->getPower();
                $keyColorTemperature = $result->getColorTemperature();
                if (!in_array($keyLampType, $lampTypeAttributes)) {
                    $lampTypeAttributes[$keyLampType] = LampTypeConstants::getConstantsById($result->getLampType());
                }
                if (!in_array($keyLength, $lengthAttributes)) {
                    $lengthAttributes[$keyLength] = LengthConstants::getConstantsById($result->getLength());
                }
                if (!in_array($keyWattage, $wattageAttributes)) {
                    $wattageAttributes[$keyWattage] = WattageConstants::getConstantsById($result->getPower());
                }
                if (!in_array($keyColorTemperature, $colorTemperatureAttributes)) {
                    $colorTemperatureAttributes[$keyColorTemperature] = ColorTemperatureConstants::getConstantsById($result->getColorTemperature());
                }

            }

            ksort($lampTypeAttributes);
            ksort($lengthAttributes);
            ksort($wattageAttributes);
            ksort($colorTemperatureAttributes);

            foreach ($lampTypeAttributes as $key => $value) {
                if ($key == $lampType) {
                    $lampTypeHtml = $lampTypeHtml . "<option value='" . $key . "' selected>" . $value . "</option>";
                } else {
                    $lampTypeHtml = $lampTypeHtml . "<option value='" . $key . "'>" . $value . "</option>";
                }
            }

            foreach ($lengthAttributes as $key => $value) {
                if ($key == $length) {
                    $lengthHtml = $lengthHtml . "<option value='" . $key . "' selected>" . $value . "</option>";
                } else {
                    $lengthHtml = $lengthHtml . "<option value='" . $key . "'>" . $value . "</option>";
                }
            }

            foreach ($wattageAttributes as $key => $value) {
                if ($key == $wattage) {
                    $wattageHtml = $wattageHtml . "<option value='" . $key . "' selected>" . $value . "</option>";
                } else {
                    $wattageHtml = $wattageHtml . "<option value='" . $key . "'>" . $value . "</option>";
                }
            }

            foreach ($colorTemperatureAttributes as $key => $value) {
                if ($key == $colorTemperature) {
                    $colorTemperatureHtml = $colorTemperatureHtml . "<option value='" . $key . "' selected>" . $value . "</option>";
                } else {
                    $colorTemperatureHtml = $colorTemperatureHtml . "<option value='" . $key . "'>" . $value . "</option>";
                }
            }

        } else {
//            $html = '<section class="t-section" id="light_sources_list"><div class="o-content-modul   "><div class="container"><div class="row  _justify-center"><div class="col col-12 col-sm-12 col-lg-8 col-xl-6"><p>Sorry</p></div></div></div></div></section>';
            $html = ' <section class="t-section" id="no_results"><div class="o-content-modul"><div class="container"><div class="row  _justify-center"><div class="col col-12 col-sm-12 col-lg-8 col-xl-6"><h3 class="" style="font-style: italic;">' . $trans->trans('$.no_results.long_message') . '</h3></div></div></div></div></section>';
        }

        $response = array(
            "code" => 200,
            'success' => true,
            'results' => $html,
            'lampTypeHtml' => $lampTypeHtml,
            'lengthHtml' => $lengthHtml,
            'wattageHtml' => $wattageHtml,
            'colorTemperatureHtml' => $colorTemperatureHtml,
        );

        return new Response(json_encode($response));
    }
}
