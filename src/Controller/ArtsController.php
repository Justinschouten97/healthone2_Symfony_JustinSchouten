<?php

namespace App\Controller;

use App\Entity\Arts;
use App\Form\ArtsType;
use App\Repository\ArtsRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @IsGranted("ROLE_ADMIN")
 * @Route("/arts")
 */
class ArtsController extends AbstractController
{
    /**
     * @Route("/", name="arts_index", methods={"GET"})
     */
    public function index(ArtsRepository $artsRepository): Response
    {
        return $this->render('arts/index.html.twig', [
            'arts' => $artsRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="arts_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $art = new Arts();
        $form = $this->createForm(ArtsType::class, $art);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($art);
            $entityManager->flush();

            return $this->redirectToRoute('arts_index');
        }

        return $this->render('arts/new.html.twig', [
            'art' => $art,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="arts_show", methods={"GET"})
     */
    public function show(Arts $art): Response
    {
        return $this->render('arts/show.html.twig', [
            'art' => $art,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="arts_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Arts $art): Response
    {
        $form = $this->createForm(ArtsType::class, $art);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('arts_index');
        }

        return $this->render('arts/edit.html.twig', [
            'art' => $art,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="arts_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Arts $art): Response
    {
        if ($this->isCsrfTokenValid('delete'.$art->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($art);
            $entityManager->flush();
        }

        return $this->redirectToRoute('arts_index');
    }
}
