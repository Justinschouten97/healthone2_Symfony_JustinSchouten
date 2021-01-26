<?php

namespace App\Controller;

use App\Entity\Medicijn;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function index(): Response
    {
        return $this->render('default.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }

    /**
     * @Route("/medicijnen", name="medicijnen_admin")
     */
    public function home(EntityManagerInterface $em): Response
    {

        $repository = $em->getRepository(Medicijn::class);
        /** @var Medicijn $medicijnen */
        $medicijnen = $repository->findAll();

        if (!$medicijnen) {
            throw $this->createNotFoundException('Geen medicijn');
        }

        return $this->render('admin/home.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }

    public function medicijnen(EntityManagerInterface $em) {
        $repository = $em->getRepository(Medicijn::class);
        $medicijnen = $repository->findAll();

        if (!$medicijnen) {
            throw $this->createNotFoundException(sprintf('Geen medicijn'));
        }
        return$this->render('medicijn/index.html.twig', [
            'medicijnen' => $medicijnen
        ]);
    }
}
