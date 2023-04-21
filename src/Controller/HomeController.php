<?php

namespace App\Controller;

use App\Constants\ColorTemperatureConstants;
use App\Constants\LampTypeConstants;
use App\Constants\LengthConstants;
use App\Constants\WattageConstants;
use App\Form\SearchType;
use App\Entity\LightSource;
use App\Entity\Ballast;
use App\Constants\BrandConstants;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;

class HomeController extends AbstractController
{
    /**
     * @Route("/{_locale}/", name="home")
     */
    public function index(Request $request): Response
    {
        $form = $this->createForm(SearchType::class, null);
        $lightSources = [];
        $ballasts = [];
        $noOfBallasts = null;
        $noOfLightSources = null;
        $noResults = false;

        if ($request->isMethod('POST')) {

            $form->handleRequest($request);

            if ($form->isValid()) {
                $query = $form->get("search")->getData();

                if(!empty($query)) {
                    $lightSources = $this->getDoctrine()->getRepository(LightSource::class)->findLightSourcesByQuery($query);
                    $noOfLightSources = count($lightSources);

                    $ballasts = $this->getDoctrine()->getRepository(Ballast::class)->findBallastByQuery($query);
                    $noOfBallasts = count($ballasts);
                }

                if(!$lightSources and !$ballasts) {
                    $noResults = true;
                }

            }
        }



        return $this->render('home/index.html.twig', array(
            'form' => $form->createView(),
            'lightSources' => $lightSources,
            'noOfLightSources' => $noOfLightSources,
            'ballasts' => $ballasts,
            'noOfBallasts' => $noOfBallasts,
            'lampTypes' => LampTypeConstants::getConstants(),
            'lengthTypes' => LengthConstants::getConstants(),
            'wattageTypes' => WattageConstants::getConstants(),
            'colorTemperatureTypes' => ColorTemperatureConstants::getConstants(),
            'noResults' => $noResults
        ));
    }

    /**
     * @Route("/", name="root_check")
     */

    public function rootCheckAction(Request $request)
    {
        $locale = $request->getLocale();

        $localizedUrl = $this->get('router')->generate('home', array('_locale' => $locale), true);

        return new RedirectResponse($localizedUrl);
    }
}
