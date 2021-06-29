<?php

namespace App\Controller;

use App\Entity\Section;
use App\Repository\SectionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomController extends AbstractController
{
    /**
     * @Route("/hom", name="hom")
     */
    public function index(SectionRepository $sectionRepository): Response
    {
        
        return $this->render('layout/layout.html.twig', [
            'controller_name' => 'HomController',
            'sections'=> $sectionRepository->findAll(),
        ]);
    }
}
