<?php

namespace App\Controller\Admin;

use App\Entity\Admin;
use App\Entity\Ballast;
use App\Entity\LightSource;
use App\Entity\Remarks;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;


class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin/", name="app_admin_dashboard_index")
     */

    public function index(): Response
    {
        $routeBuilder = $this->get(AdminUrlGenerator::class);

        return $this->redirect($routeBuilder->setController(LightSourceCrudController::class)->generateUrl());
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            // by default, all backend URLs include a signature hash. If a user changes any
            // query parameter (to "hack" the backend) the signature won't match and EasyAdmin
            // triggers an error. If this causes any issue in your backend, call this method
            // to disable this feature and remove all URL signature checks
            ->disableUrlSignatures()
            ;
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToCrud('Light source', 'fa fa-lightbulb-o', LightSource::class);
        yield MenuItem::linkToCrud('Ballast', 'fa fa-battery-empty', Ballast::class);
        yield MenuItem::linkToCrud('Remarks', 'fa fa-asterisk', Remarks::class);
//        yield MenuItem::linkToCrud('Users', 'fa fa-file-pdf', Admin::class)->setPermission('ROLE_ADMIN');
        yield MenuItem::linkToRoute('User management', 'fa fa-user-o', 'users_preview')->setPermission('ROLE_ADMIN');
    }

}
