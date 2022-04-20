<?php

namespace App\Controller;

use App\Entity\Rapportvisite;
use App\Form\RapportvisiteType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/rapportvisite")
 */
class RapportvisiteController extends AbstractController
{
    /**
     * @Route("/", name="app_rapportvisite_index", methods={"GET"})
     */
    public function index(EntityManagerInterface $entityManager): Response
    {
        $rapportvisites = $entityManager
            ->getRepository(Rapportvisite::class)
            ->findAll();

        return $this->render('rapportvisite/index.html.twig', [
            'rapportvisites' => $rapportvisites,
        ]);
    }

    /**
     * @Route("/new", name="app_rapportvisite_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $rapportvisite = new Rapportvisite();
        $form = $this->createForm(RapportvisiteType::class, $rapportvisite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($rapportvisite);
            $entityManager->flush();

            return $this->redirectToRoute('app_rapportvisite_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('rapportvisite/new.html.twig', [
            'rapportvisite' => $rapportvisite,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_rapportvisite_show", methods={"GET"})
     */
    public function show(Rapportvisite $rapportvisite): Response
    {
        return $this->render('rapportvisite/show.html.twig', [
            'rapportvisite' => $rapportvisite,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_rapportvisite_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Rapportvisite $rapportvisite, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(RapportvisiteType::class, $rapportvisite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_rapportvisite_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('rapportvisite/edit.html.twig', [
            'rapportvisite' => $rapportvisite,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_rapportvisite_delete", methods={"POST"})
     */
    public function delete(Request $request, Rapportvisite $rapportvisite, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$rapportvisite->getId(), $request->request->get('_token'))) {
            $entityManager->remove($rapportvisite);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_rapportvisite_index', [], Response::HTTP_SEE_OTHER);
    }
}
