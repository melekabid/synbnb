<?php

namespace App\Controller;


use App\Entity\Fournisseur;
use App\Form\FournisseurType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;


class FournisseurController extends AbstractController
{
    /**
     * @Route("/fournisseur", name="app_fournisseur")
     * )
     */
    public function fournisseur(): Response
    {


        $repo = $this->getDoctrine()->getRepository(Fournisseur::class);
        $fournisseur = $repo->findAll();

        return $this->render('fournisseur/fournisseur.html.twig', [
            'controller_name' => 'ProduitController', 'fournisseurs' => $fournisseur
        ]);
    }

    /**
     * @Route("/ajoutfournisseur", name="add_fournisseur")
     * @Route("/editfournisseur{id}", name="edit_fournisseur")
     */
    public function ajouterf(Request $request, ManagerRegistry $managerRegistry, Fournisseur $fournisseur = null, SluggerInterface $slugger): Response
    {
        if (!$fournisseur) {
            $fournisseur = new Fournisseur();
        }

        $form = $this->createForm(FournisseurType::class, $fournisseur);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $file = $form->get('fichefournisseur')->getData();

            if ($file) {
                $originalFilename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename . '-' . uniqid() . '.' . $file->guessExtension();
                $file->move($this->getParameter('files_directory'), $newFilename);
                $fournisseur->setFichefournisseur($newFilename);

            }
            $manager = $managerRegistry->getManager();
            $manager->persist($fournisseur);
            $manager->flush();
            return $this->redirectToRoute('app_fournisseur');
        }
        return $this->render('fournisseur/ajoutfournissur.html.twig', [
            'formfor' => $form->createView()
        ]);
    }
}
