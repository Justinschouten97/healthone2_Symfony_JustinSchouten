<?php

namespace App\Controller;

use App\Entity\Afdeling;
use App\Form\AfdelingType;
use App\Repository\AfdelingRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/afdeling")
 */
class AfdelingController extends AbstractController
{
    /**
     * @Route("/", name="afdeling_index", methods={"GET"})
     */
    public function index(AfdelingRepository $afdelingRepository): Response
    {
        return $this->render('afdeling/index.html.twig', [
            'afdelings' => $afdelingRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="afdeling_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $afdeling = new Afdeling();
        $form = $this->createForm(AfdelingType::class, $afdeling);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($afdeling);
            $entityManager->flush();

            return $this->redirectToRoute('afdeling_index');
        }

        return $this->render('afdeling/new.html.twig', [
            'afdeling' => $afdeling,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="afdeling_show", methods={"GET"})
     */
    public function show(Afdeling $afdeling): Response
    {
        return $this->render('afdeling/show.html.twig', [
            'afdeling' => $afdeling,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="afdeling_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Afdeling $afdeling): Response
    {
        $form = $this->createForm(AfdelingType::class, $afdeling);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('afdeling_index');
        }

        return $this->render('afdeling/edit.html.twig', [
            'afdeling' => $afdeling,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="afdeling_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Afdeling $afdeling): Response
    {
        if ($this->isCsrfTokenValid('delete'.$afdeling->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($afdeling);
            $entityManager->flush();
        }

        return $this->redirectToRoute('afdeling_index');
    }
}
