<?php

namespace App\Controller;

use App\Entity\Medicijn;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Security("has_role('ROLE_ADMIN') or has_role('ROLE_ARTS') or has_role('ROLE_MEDEWERKER')")
 */
class AdminController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function index(): Response
    {
        return $this->render('default.html.twig', [

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
