<?php

namespace App\Controller;

use App\Entity\Techniquemachine;
use App\Form\FichemachineType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

class TechniqueMachineController extends AbstractController
{
    /**
     * @Route("/techniquemachine", name="app_techniquemachine")
    )
     */
    public function fournisseur(): Response
    {


        $repo=$this->getDoctrine()->getRepository(Techniquemachine::class);
        $techniquemachine=$repo->findAll();

        return $this->render('technique_machine/fichemachine.html.twig', [
            'controller_name' => 'ProduitController', 'techniquemachines' => $techniquemachine
        ]);
    }
    /**
     * @Route("/ajouttechniquemachine", name="add_techniquemachine")
     * @Route("/edittechniquemachine{id}", name="edit_technique")
     */
    public function ajouterfichemachine(Request $request, ManagerRegistry  $managerRegistry,Techniquemachine $techniquemachine=null , SluggerInterface $slugger): Response
    {
        if(!$techniquemachine)
        {
            $techniquemachine = new Techniquemachine();
        }

        $form = $this->createForm(FichemachineType::class, $techniquemachine);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $file = $form->get('fichemachine')->getData();

            if($file){
                $originalFilename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename.'-'.uniqid().'.'.$file->guessExtension();
                $file->move($this->getParameter('files_directory'),$newFilename);
                $techniquemachine->setFichemachine($newFilename);

            }
            $manager = $managerRegistry->getManager();
            $manager->persist($techniquemachine);
            $manager->flush();
            return  $this->redirectToRoute('app_techniquemachine');

        }
        return $this->render('technique_machine/ajoutfichemachine.html.twig', [
            'controller_name' => 'TechniqueMachineController','formtech'=> $form->createView()
        ]);
    }
}
