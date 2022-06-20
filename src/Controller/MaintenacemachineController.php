<?php

namespace App\Controller;

use App\Entity\Maintenancemachine;
use App\Form\MaintenancemachineType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

class MaintenacemachineController extends AbstractController
{
    /**
     * @Route("/maintenacemachine", name="app_maintenacemachine")
     */
    public function index(): Response
    {
        $repo = $this->getDoctrine()->getRepository(Maintenancemachine::class);
        $maintenance = $repo->findAll();
        return $this->render('maintenacemachine/maintenancemachine.html.twig', [
            'controller_name' => 'MaintenacemachineController', 'maintenances' => $maintenance
        ]);
    }

    /**
     * @Route("/ajoutmaintenacemachine", name="add_maintenacemachine")
     * @Route("/editmaintenacemachine{id}", name="edit_maintenacemachine")
     */
    public function ajoutermain(Request $request, ManagerRegistry $managerRegistry, Maintenancemachine $Maintenancemachine = null): Response
    {
        if (!$Maintenancemachine) {
            $Maintenancemachine = new Maintenancemachine();
        }

        $form = $this->createForm(MaintenancemachineType::class, $Maintenancemachine);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $Maintenancemachine->setDate(new  \DateTimeImmutable());
            $manager = $managerRegistry->getManager();
            $manager->persist($Maintenancemachine);
            $manager->flush();
            return $this->redirectToRoute('app_maintenacemachine');

        }
        return $this->render('maintenacemachine/ajoutermaintenance.html.twig', [
            'formmain' => $form->createView()
        ]);
    }
}
