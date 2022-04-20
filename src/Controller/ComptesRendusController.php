<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/comptes-rendus")
 */
class ComptesRendusController extends AbstractController
{
    /**
     * @Route("/", name="app_comptes_rendus")
     */
    public function index(): Response
    {
        return $this->render('comptes_rendus/comptesRendus.html.twig', [
            'controller_name' => 'ComptesRendusController',
        ]);
    }
    /**
     * @Route("/new", name="app_comptes_rendus_new")
     */
    public function new(): Response
    {
        
        return $this->render('Home/home.html.twig');

    }
}
