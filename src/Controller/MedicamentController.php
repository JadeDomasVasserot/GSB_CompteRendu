<?php

namespace App\Controller;

use App\Entity\Medicament;
use App\Form\MedicamentType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncode;

/**
 * @Route("/medicament")
 */
class MedicamentController extends AbstractController
{
    /**
     * @Route("/", name="app_medicament_index", methods={"GET"})
     */
    public function index(EntityManagerInterface $entityManager): Response
    {
        $medicaments = $entityManager
            ->getRepository(Medicament::class)
            ->findAll();

        return $this->render('medicament/index.html.twig', [
            'medicaments' => $medicaments,
        ]);
    }
    /**
     * @Route("/getListe", name="app_getListe_medicaments", methods={"GET"})
     */
    // public function medicaments(EntityManagerInterface $entityManager): Response
    // {
    //     $tabMedic = array('AllMedicaments' => array());
    //     $medicaments = $this->getDoctrine()
    //     ->getRepository(Medicament::class)
    //     ->findAll();

    //     foreach($medicaments as $medicament)
    //     {
    //         $medicament = array(
    //             'id'=> $medicament->getId(),
    //             'nomCommercial' => $medicament->getNomcommercial(),
    //             'famille' => $medicament->getIdfamille(),
    //             'compositon' => $medicament->getComposition(),
    //             'effetInde' => $medicament->getEffetsindesirables(),
    //             'contreIndic' => $medicament->getContreindications(),
    //             'prixEchan' => $medicament->getPrixechantillon(),
    //         );
    //             array_push($tabMedic["AllMedicaments"], $medicament);
                
    //         }
    //         $response = new JsonResponse($tabMedic);
    //         $response->headers->set('Content-Type', 'application/json');
    //         return $response;
    // }
    /**
     * @Route("/getListeNom", name="app_getListe_medicamentsNom", methods={"GET"})
     */
    public function medicamentsNom(EntityManagerInterface $entityManager): Response
    {
        $medicaments = $this->getDoctrine()
        ->getRepository(Medicament::class)
        ->findAll();
        $tabMedic = array();
        foreach($medicaments as $medicament){
            $medicament = array(
                'id'=> $medicament->getId(),
                'nomCommercial' => $medicament->getNomcommercial(),
            );
            array_push($tabMedic, $medicament);
            
        }
        $response = new Response();
        $response->setContent(json_encode($tabMedic));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }
    /**
     * @Route("/new", name="app_medicament_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $medicament = new Medicament();
        $form = $this->createForm(MedicamentType::class, $medicament);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($medicament);
            $entityManager->flush();

            return $this->redirectToRoute('app_medicament_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('medicament/new.html.twig', [
            'medicament' => $medicament,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_medicament_show", methods={"GET"})
     */
    public function show(Medicament $medicament): Response
    {
        return $this->render('medicament/show.html.twig', [
            'medicament' => $medicament,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_medicament_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Medicament $medicament, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(MedicamentType::class, $medicament);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_medicament_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('medicament/edit.html.twig', [
            'medicament' => $medicament,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_medicament_delete", methods={"POST"})
     */
    public function delete(Request $request, Medicament $medicament, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$medicament->getId(), $request->request->get('_token'))) {
            $entityManager->remove($medicament);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_medicament_index', [], Response::HTTP_SEE_OTHER);
    }
}
