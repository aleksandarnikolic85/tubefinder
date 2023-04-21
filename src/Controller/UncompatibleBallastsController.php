<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Ballast;
use App\Entity\LightSource;

class UncompatibleBallastsController extends AbstractController
{
    /**
     * @Route("/{_locale}/incompatible-ballasts/{id}/{sort}", name="incompatible_ballasts")
     */
    public function index($id, $sort = null): Response
    {
        $ballasts = $this->getDoctrine()->getRepository(Ballast::class)->findIncompatibleBallasts($id, $sort);
        $lightSource = $this->getDoctrine()->getRepository(LightSource::class)->findOneBy(array('id' => $id));

        return $this->render('uncompatible_ballasts/index.html.twig', [
            'ballasts' => $ballasts,
            'lightSource' => $lightSource
        ]);
    }
}
