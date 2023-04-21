<?php

namespace App\Controller;

use App\Entity\Remarks;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Ballast;
use App\Entity\LightSource;

class CompatibleLightSourcesController extends AbstractController
{
    /**
     * @Route("/{_locale}/compatible-light-sources/{id}", name="compatible_light_sources")
     */
    public function index($id): Response
    {
        $lightSources = $this->getDoctrine()->getRepository(LightSource::class)->findCompatibleLightSources($id);
        $ballast = $this->getDoctrine()->getRepository(Ballast::class)->findOneBy(array('id' => $id));
        $incompatibleLightSources = $this->getDoctrine()->getRepository(LightSource::class)->findIncompatibleLightSources($id);

        return $this->render('compatible_light_sources/index.html.twig', [
            'lightSources' => $lightSources,
            'ballast' => $ballast,
            'incompatibleLightSources' => $incompatibleLightSources
        ]);
    }
}
