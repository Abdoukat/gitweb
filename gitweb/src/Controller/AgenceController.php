<?php

namespace App\Controller;

use App\Entity\Agences;
use App\Entity\Villes;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Mapping\Id;
use PhpParser\Node\Name;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AgenceController extends AbstractController
{


    /*private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->$em = $em;
        
       
    }*/

    /**
     * @Route("/agence", name="agence")
     */
    public function index(): Response
    {
        $ville = new Villes();
        $agence = new Agences();
        
        $em = $this->getDoctrine()->getManager();


        $nomVille = $em->getRepository(Villes::class)->findOneBy(["nom" => "Marrakech"]);

        if ($nomVille->getNom() !== "Tanger") {
            $ville->setNom("Tanger");
            $ville->setCodePostal("65000");
            $em->persist($ville);
        }else
        {
            $ville = $nomVille;
        }
        
        $nomAgence = $em->getRepository(Agences::class)->findOneBy(["nom" => "Test4"]);
        if ($nomAgence->getNom() !== "Test4") {
            $agence->setNom("Test4");
            $agence->setAdresse("Maroc");
            $agence->setCreatedAt(new DateTime("now"));
            $agence->setVille($ville);
            $em->persist($agence);
        }else 
        {
            $agence = $nomAgence; 
        }
        
        $em->flush();
        

        return $this->render('agence/index.html.twig', [
            'controller_name' => 'AgenceController',
            'ville' => $ville,
            'agence' => $agence,
        ]);
    }




    /**
     * @Route("/agence/list", name="agenceListe")
     */

    public function listeAgence(){
        $em = $this->getDoctrine()->getManager();
        $listeAgence = $em->getRepository(Agences::class)->findAll();
        
        return $this->render('agence/list.html.twig', [
            'Agences' => $listeAgence,
        ]);

    }



    /**
     * @Route("/agence/show/{id}", name="showagence")
     */

    public function showAgence(Agences $agence){
        //$em = $this->getDoctrine()->getManager();
        //$agence = $em->getRepository(Agences::class)->findOneBy(["id" => $id]);
        
        return $this->render('agence/show.html.twig', [
            'Agence' => $agence,
        ]);

    }



    

    
}
