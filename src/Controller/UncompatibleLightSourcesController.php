<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Ballast;
use App\Entity\LightSource;

class UncompatibleLightSourcesController extends AbstractController
{
    /**
     * @Route("/{_locale}/incompatible-light-sources/{id}", name="incompatible_light_sources")
     */
    public function index($id): Response
    {
        $lightSources = $this->getDoctrine()->getRepository(LightSource::class)->findIncompatibleLightSources($id);
        $ballast = $this->getDoctrine()->getRepository(Ballast::class)->findOneBy(array('id' => $id));

        return $this->render('uncompatible_light_sources/index.html.twig', [
            'lightSources' => $lightSources,
            'ballast' => $ballast
        ]);
    }
}
