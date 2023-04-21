<?php

namespace App\Controller\Ajax;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Ballast;
use App\Entity\LightSource;
use Symfony\Contracts\Translation\TranslatorInterface;

class PredefinedSearchController extends AbstractController
{
    /**
     * @Route("/{_locale}/ajax/predefined_search", name="predefined_search")
     */
    public function index(TranslatorInterface $trans)
    {
        $em = $this->getDoctrine()->getManager();
        $searchTerm = $_POST['term'];
        $results = array();

        $lightSourcesEans = $em->getRepository(LightSource::class)->findEansForPredefinedSearch($searchTerm);
        $lightSourcesBCs = $em->getRepository(LightSource::class)->findBCsForPredefinedSearch($searchTerm);
        $lightSourcesProductNames = $em->getRepository(LightSource::class)->findProductNameForPredefinedSearch($searchTerm);

        $ballastsEans = $em->getRepository(Ballast::class)->findEansForPredefinedSearch($searchTerm);
        $ballastsRefNos = $em->getRepository(Ballast::class)->findRefNosForPredefinedSearch($searchTerm);
        $ballastsProductNames = $em->getRepository(Ballast::class)->findProductNameForPredefinedSearch($searchTerm);

        foreach ($lightSourcesEans as $lightSource) {
            $results[] = $lightSource->getEan();
        }

        foreach ($lightSourcesBCs as $lightSource) {
            $results[] = $lightSource->getBasicCode();
        }

        foreach ($lightSourcesProductNames as $lightSource) {
            $results[] = $lightSource->getProductName();
        }

        foreach ($ballastsEans as $ballast) {
            $results[] = $ballast->getEan();
        }

        foreach ($ballastsRefNos as $ballast) {
            $results[] = $ballast->getRefNo();
        }

        foreach ($ballastsProductNames as $ballast) {
            $results[] = $ballast->getProductName();
        }

        $results = array_slice($results, 0, 9);

        $html = '<ul>';

        if($results) {
            foreach ($results as $result) {

                $html = $html . '<li>' . str_replace($searchTerm, '<b>' .$searchTerm . '</b>', $result) . '</li>';
            }

        } else {
            $html = $html . '<li>' . $trans->trans('$.no_results.short_message') . '</li>';
        }

        $html = $html . '</ul>';




//        console.log($searchTerm);

        $response = array(
            'success' => true,
            'html' => $html
        );

        return new Response(json_encode($response));
    }
}
