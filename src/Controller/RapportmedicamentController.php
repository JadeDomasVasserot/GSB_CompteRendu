<?php

namespace App\Controller;

use App\Entity\Rapportmedicament;
use App\Form\RapportmedicamentType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/rapportmedicament")
 */
class RapportmedicamentController extends AbstractController
{
    /**
     * @Route("/", name="app_rapportmedicament_index", methods={"GET"})
     */
    public function index(EntityManagerInterface $entityManager): Response
    {
        $rapportmedicaments = $entityManager
            ->getRepository(Rapportmedicament::class)
            ->findAll();

        return $this->render('rapportmedicament/index.html.twig', [
            'rapportmedicaments' => $rapportmedicaments,
        ]);
    }

    /**
     * @Route("/new", name="app_rapportmedicament_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $rapportmedicament = new Rapportmedicament();
        $form = $this->createForm(RapportmedicamentType::class, $rapportmedicament);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($rapportmedicament);
            $entityManager->flush();

            return $this->redirectToRoute('app_rapportmedicament_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('rapportmedicament/new.html.twig', [
            'rapportmedicament' => $rapportmedicament,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_rapportmedicament_show", methods={"GET"})
     */
    public function show(Rapportmedicament $rapportmedicament): Response
    {
        return $this->render('rapportmedicament/show.html.twig', [
            'rapportmedicament' => $rapportmedicament,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_rapportmedicament_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Rapportmedicament $rapportmedicament, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(RapportmedicamentType::class, $rapportmedicament);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_rapportmedicament_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('rapportmedicament/edit.html.twig', [
            'rapportmedicament' => $rapportmedicament,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_rapportmedicament_delete", methods={"POST"})
     */
    public function delete(Request $request, Rapportmedicament $rapportmedicament, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$rapportmedicament->getId(), $request->request->get('_token'))) {
            $entityManager->remove($rapportmedicament);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_rapportmedicament_index', [], Response::HTTP_SEE_OTHER);
    }
}
