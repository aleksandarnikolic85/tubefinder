<?php

namespace App\Controller;

use App\Entity\Ballast;
use App\Entity\LightSource;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Snappy\Pdf;
use Symfony\Contracts\Translation\TranslatorInterface;

class CreatePDFController extends AbstractController
{
    /**
     * @Route("/{_locale}/create_pdf/{id}/{ballast_id}", name="create_pdf", methods={"GET"})
     */

    public function createPdfForProduct($id, $ballast_id, Request $request, TranslatorInterface $trans)
    {
        $lightSource = $this->getDoctrine()->getRepository(LightSource::class)->find($id);
        $ballast = $this->getDoctrine()->getRepository(Ballast::class)->find($ballast_id);

        $html = $this->renderView('pdf_template/content.html.twig', array(
            'lightSource' => $lightSource,
            'ballast' => $ballast,
            'title' =>  $trans->trans('$.pdf_text.compatible_osram_substitube') . "-" . $lightSource->getEan(),
        ));
        $header = $this->renderView('pdf_template/header.html.twig');
        $footer = $this->renderView('pdf_template/footer.html.twig');

        $options = [
            'header-html' => $header,
            'footer-html' => $footer,
            "page-size" => "A4",
        ];

        $snappy = new Pdf(" C:\doc\wkhtmltopdf\bin\wkhtmltopdf.exe");
//        $snappy = new Pdf("/usr/local/bin/wkhtmltopdf");

        $filename = str_replace([' ', '/', '-'], '_', $lightSource->getEan());
        return new Response(
            $snappy->getOutputFromHtml($html, $options),200,array(
                'Content-Type'          => 'application/pdf',
                'Content-Disposition'   => 'inline; filename="'.$filename.'.pdf"',
            )
        );


    }

    /**
     * @Route("/{_locale}/create_pdf_for_table/{id}", name="create_pdf_for_table", methods={"GET"})
     */

    public function createPdfForTable($id, Request $request, TranslatorInterface $trans)
    {
        if($id) {
            $ballast = $this->getDoctrine()->getRepository(Ballast::class)->find($id);

            $lightSources = $this->getDoctrine()->getRepository(LightSource::class)->findCompatibleLightSources($ballast);

            $html = $this->renderView('pdf_template/table_content.html.twig', array(
                'ballast' => $ballast,
                'lightSources' => $lightSources,
                'title' =>  $trans->trans('$.pdf_text.compatible_lights'),
            ));
            $header = $this->renderView('pdf_template/header.html.twig');
            $footer = $this->renderView('pdf_template/footer.html.twig');

            $options = [
                'header-html' => $header,
                'footer-html' => $footer,
                "page-size" => "A4",
            ];

            $snappy = new Pdf(" C:\doc\wkhtmltopdf\bin\wkhtmltopdf.exe");
//            $snappy = new Pdf("/usr/local/bin/wkhtmltopdf");

            $filename = str_replace([' ', '/', '-'], '_', $ballast->getProductName() . " COMPATIBLE_LIGHT_SOURCES");
            return new Response(
                $snappy->getOutputFromHtml($html, $options),200,array(
                    'Content-Type'          => 'application/pdf',
                    'Content-Disposition'   => 'inline; filename="'.$filename.'.pdf"',
                )
            );
        }

        return null;
    }

    /**
     * @Route("/{_locale}/create_pdf_for_ballast/{id}/{lightSourceId}", name="create_pdf_for_ballast", methods={"GET"})
     */

    public function createPdfForBallast($id, $lightSourceId, Request $request, TranslatorInterface $trans)
    {
        $lightSource = $this->getDoctrine()->getRepository(LightSource::class)->find($lightSourceId);
        $ballast = $this->getDoctrine()->getRepository(Ballast::class)->find($id);

        $html = $this->renderView('pdf_template/content_ballast.html.twig', array(
            'lightSource' => $lightSource,
            'ballast' => $ballast,
            'title' =>  $trans->trans('$.pdf_text.compatible_ballast'),
        ));
        $header = $this->renderView('pdf_template/header.html.twig');
        $footer = $this->renderView('pdf_template/footer.html.twig');

        $options = [
            'header-html' => $header,
            'footer-html' => $footer,
            "page-size" => "A4",
        ];

        $snappy = new Pdf(" C:\doc\wkhtmltopdf\bin\wkhtmltopdf.exe");
//        $snappy = new Pdf("/usr/local/bin/wkhtmltopdf");

        $filename = str_replace([' ', '/', '-'], '_', $ballast->getProductName());
        return new Response(
            $snappy->getOutputFromHtml($html, $options),200,array(
                'Content-Type'          => 'application/pdf',
                'Content-Disposition'   => 'inline; filename="'.$filename.'.pdf"',
            )
        );
    }
}
