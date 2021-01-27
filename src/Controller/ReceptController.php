<?php

namespace App\Controller;

use App\Entity\Recept;
use App\Form\ReceptType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @IsGranted("ROLE_ADMIN")
 * @Route("/recept")
 */
class ReceptController extends AbstractController
{
    /**
     * @Route("/", name="recept_index", methods={"GET"})
     */
    public function index(): Response
    {
        $recepts = $this->getDoctrine()
            ->getRepository(Recept::class)
            ->findAll();

        return $this->render('recept/index.html.twig', [
            'recepts' => $recepts,
        ]);
    }

    /**
     * @Route("/new", name="recept_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $recept = new Recept();
        $form = $this->createForm(ReceptType::class, $recept);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($recept);
            $entityManager->flush();

            return $this->redirectToRoute('recept_index');
        }

        return $this->render('recept/new.html.twig', [
            'recept' => $recept,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="recept_show", methods={"GET"})
     */
    public function show(Recept $recept): Response
    {
        return $this->render('recept/show.html.twig', [
            'recept' => $recept,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="recept_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Recept $recept): Response
    {
        $form = $this->createForm(ReceptType::class, $recept);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('recept_index');
        }

        return $this->render('recept/edit.html.twig', [
            'recept' => $recept,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="recept_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Recept $recept): Response
    {
        if ($this->isCsrfTokenValid('delete'.$recept->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($recept);
            $entityManager->flush();
        }

        return $this->redirectToRoute('recept_index');
    }
}
