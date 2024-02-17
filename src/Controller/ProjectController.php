<?php

namespace App\Controller;

use App\Repository\ProjectRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ProjectController extends AbstractController
{
    #[Route('/', name: 'home')]
    #[Route('/projects', name: 'projects')]
    public function index(ProjectRepository $repository): Response
    {
        return $this->render('project/index.html.twig', [
            'projects' => $repository->findAll(),
        ]);
    }

    #[Route('/project/{id}', name: 'project')]
    public function project(int $id, ProjectRepository $repository): Response
    {
        $project = $repository->find($id);

        if (!$project) {
            throw $this->createNotFoundException();
        }

        return $this->render('project/detail.html.twig', [
            'project' => $project,
        ]);
    }
}
