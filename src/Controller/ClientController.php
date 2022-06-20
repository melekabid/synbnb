<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Client ; 
use App\Form\ClientType; 
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class ClientController extends AbstractController
{
    /**
     
     
     *@Route("/Remclient{id}",name="rem_client")
     */

    public function remove(Client $client){

        $manager=$this->getDoctrine()->getManager();
        $manager->remove($client);
        $manager->flush(); 
        $repo=$this->getDoctrine()->getRepository(Client::class);
        $clients=$repo->findAll();
        return $this->redirectToRoute('app_client', ['clients'=>$clients]);

    }
    
    
    
    /**
    

     * @Route("/client", name="app_client")
     */
    public function index(): Response
    {
        $repo=$this->getDoctrine()->getRepository(Client::class);
        $clients=$repo->findAll();
        return $this->render('client/client.html.twig', [
            'clients'=>$clients
        ]);
    }

    /**
     * @param Request $request
     * @Route("/ajoutclient", name="add_client")
     *@Route("/client{id}",name="mod_client")
     */

     
    public function ajoutclient(Client $client=null , Request $request )
    {
        
if(!$client)
{
 $client=new Client();
    }
    dump($request);
if($request->request->count()>0){
   
    $client->setSociete($request->request->get('societe'))
           ->setAdresse($request->request->get('adresse'))
           ->setGsm($request->request->get('gsm'))
           ->setMail($request->request->get('email'))
           ->setPourcentagebenifice($request->request->get('pourcentagebenifice'))
           ->setCodematricule('codematricule');
$manager=$this->getDoctrine()->getManager();
$manager->persist($client);
$manager->flush(); 
$repo=$this->getDoctrine()->getRepository(Client::class);
$clients=$repo->findAll();
return $this->redirectToRoute('app_client', ['clients'=>$clients]);

}     
        return $this->render('client/ajouterclient.html.twig', [
            'controller_name' => 'ClientController','client'=>$client
        ]);
    }
}
