<?php

namespace App\Controller;

use App\Entity\Client;
use App\Form\ClientType;
use App\Repository\ClientRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

    /**
     * @Route("/client")
     */
class ClientController extends AbstractController
{
    /**
     * @Route("/", name="client_index")
     */
    public function index(ClientRepository $clientRepository)
    {
        

        return $this->render('client/index.html.twig', [
            'clients' => $clientRepository->findAll(),
            
        ]);
    }

    /**
     * @Route("/new", name="client_new")
     */
    public function addClient(Request $request)
    {
        $client = new Client();
        $form = $this->createForm(ClientType::class, $client);
        
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($client);
            $em->flush();
            return $this->redirectToRoute("client_index");
        }


        return $this->render('client/new.html.twig', [
            'controller_name' => 'ClientController',
            'form' => $form->createView(),
        ]);
    }
    /**
     * @Route("/show/{id}", name="client_show")
     */
    public function showClient(Client $client)
    {
        

        return $this->render('client/show.html.twig', [
            'client' => $client,
            
        ]);
    }

    /**
    * @Route("/{id}/edit", name="client_edit", methods={"GET", "POST"})
    */
    public function edit(Request $request, Client $client){

        $form = $this->createForm(ClientType::class, $client);
        $form->handleRequest($request);
        if( $form->isSubmitted() && $form->isValid()){
        $this->getDoctrine()->getManager()->flush();
        return $this->redirectToRoute('client_index');
        }
        return $this->render(('client/edit.html.twig'),[
    
        'form' => $form->createView(),
    
        ]);
    }

    /**
     * @Route("/delete/{id}", name="client_delete", methods={"POST"})
     */

    public function delete(Request $request, Client $client){

        if($this->isCsrfTokenValid('delete'.$client->getId(), $request->request->get('_token'))){
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($client);
            $entityManager->flush();
        }
        


        return $this->redirectToRoute('client_index');
     }
}
