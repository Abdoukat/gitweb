<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdvertController extends AbstractController
{
    /**
     * @Route("/advert", name="advert")
     */
    public function index(): Response
    {
        $url = $this->generateUrl('hom', array('nom'=> 'mazego'));
        return new RedirectResponse($url);

        //return $this->render('advert/index.html.twig', [
        //    'controller_name' => 'AdvertController',
        //]);
    }
}
