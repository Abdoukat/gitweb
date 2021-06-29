<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LuckyController extends AbstractController
{
    /**
     * @Route("/lucky/number/{max}", name="lucky_number", defaults={"max"=2})
     */
    public function number(int $max): Response
    {
        $number = random_int(0, $max);

        return $this->render('lucky/index.html.twig', [
            
            'number' => $number,

            
            
            //'controller_name' => 'LuckyController',
        ]);
    }

    /**
     * @Route("/blog/{year}/{title}/{_local}",requirements={"_local": "en|fr", "title": "[a-zA-Z0-9\-\_]+"}, defaults={"_local"="fr"})
     */
    public function blog($_local, int $year,$title): Response
    {
        
        return $this->render('lucky/blog.html.twig', [
            '_local' => $_local,
            'year' => $year,
            'title' => $title,
            //'controller_name' => 'LuckyController',
        ]);
    }
}
