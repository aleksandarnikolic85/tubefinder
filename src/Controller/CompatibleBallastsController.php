<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Ballast;
use App\Entity\LightSource;

class CompatibleBallastsController extends AbstractController
{
    /**
     * @Route("/{_locale}/compatible-ballasts/{id}/{sort}", name="compatible_ballasts")
     */
    public function index($id, $sort = null): Response
    {
        $ballasts = $this->getDoctrine()->getRepository(Ballast::class)->findCompatibleBallasts($id, $sort);
        $lightSource = $this->getDoctrine()->getRepository(LightSource::class)->findOneBy(array('id' => $id));
        $incompatibleBallasts = $this->getDoctrine()->getRepository(Ballast::class)->findIncompatibleBallasts($id, $sort);

        return $this->render('compatible_ballasts/index.html.twig', [
            'ballasts' => $ballasts,
            'lightSource' => $lightSource,
            'incompatibleBallasts' => $incompatibleBallasts
        ]);
    }

    /**
     * @Route("/{_locale}/ean/{ean}", name="compatible_ballasts_by_ean")
     */
    public function findByEan($ean): Response
    {
        $ballasts = $this->getDoctrine()->getRepository(Ballast::class)->findCompatibleBallastsByEan($ean);
        $lightSource = $this->getDoctrine()->getRepository(LightSource::class)->findOneBy(array('ean' => $ean));
//        $incompatibleBallasts = $this->getDoctrine()->getRepository(Ballast::class)->findIncompatibleBallasts($id, $sort);
        $incompatibleBallasts = $this->getDoctrine()->getRepository(Ballast::class)->findIncompatibleBallastsByEan($ean);
//        $incompatibleBallasts = array();

        return $this->render('compatible_ballasts/index.html.twig', [
            'ballasts' => $ballasts,
            'lightSource' => $lightSource,
            'incompatibleBallasts' => $incompatibleBallasts
        ]);
    }
}
