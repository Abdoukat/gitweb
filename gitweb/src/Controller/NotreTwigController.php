<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NotreTwigController extends AbstractController
{
    /**
     * @Route("/notre/twig/{nom}/{prenom}", name="notre_twig")
     */
    public function index($nom, $prenom): Response
    {
        return $this->render('notre_twig/index.html.twig', [
            'nom' => $nom,
            'prenom' => $prenom,
        ]);
    }
}
