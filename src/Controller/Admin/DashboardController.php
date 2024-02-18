<?php

namespace App\Controller\Admin;

use App\Entity\User;
use App\Entity\Project;
use App\Entity\Category;
use App\Entity\Technology;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    public function __construct(private readonly AdminUrlGenerator $adminUrlGenerator)
    {
    }

    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $url = $this->adminUrlGenerator
            ->setController(ProjectCrudController::class)
            ->generateUrl();

        return $this->redirect($url);

        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Project Administration');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToRoute('Home', 'fas fa-home', 'home');
        yield MenuItem::linkToCrud('Project', 'fas fa-layer-group', Project::class)->setAction(Crud::PAGE_INDEX);
        yield MenuItem::linkToCrud('Technology', 'fas fa-layer-group', Technology::class)->setAction(Crud::PAGE_INDEX);
        yield MenuItem::linkToCrud('Category', 'fas fa-layer-group', Category::class)->setAction(Crud::PAGE_INDEX);
        yield MenuItem::linkToCrud('User', 'fas fa-layer-group', User::class)->setAction(Crud::PAGE_INDEX);
    }
}
