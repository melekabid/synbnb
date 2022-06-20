<?php

namespace App\Controller;

use App\Entity\Categorie;
use App\Entity\Produit;
use App\Form\ProduitType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class ProduitController extends AbstractController
{
    /**
     * @Route("/produit", name="app_produit")
     * )
     */
    public function Produit(): Response
    {


        $repo = $this->getDoctrine()->getRepository(Produit::class);
        $produit = $repo->findAll();
        $repo = $this->getDoctrine()->getRepository(Categorie::class);
        $Categorie = $repo->findAll();


        return $this->render('produit/produit.html.twig', [
            'controller_name' => 'ProduitController', 'produits' => $produit, 'Categories' => $Categorie
        ]);
    }

    /**
     * @Route("/ajoutproduit", name="add_produit")
     * @Route("/editproduit{id}", name="edit_produit")
     */
    public function AjoutProduit(Request $request, ManagerRegistry $managerRegistry, Produit $produit = null, SluggerInterface $slugger): Response
    {
        if (!$produit) {
            $produit = new Produit();

        }
        $form = $this->createForm(ProduitType::class, $produit);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $imagefile = $form->get('img')->getData();
            $prixdollar = $form->get('prixdollar')->getData();
            $prixdinar = $form->get('prixdinar')->getData();
            $tauxdechange = $form->get('tauxdechange')->getData();
            $tva = $form->get('tva')->getData();

            if ($imagefile) {
                $originalFilename = pathinfo($imagefile->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename . '-' . uniqid() . '.' . $imagefile->guessExtension();
                $imagefile->move($this->getParameter('images_directory'), $newFilename);
                $produit->setImg($newFilename);

            }

            if ($prixdollar == 0) {
                $produit->setPrixdollar($prixdinar * $tauxdechange);
            }
            if ($prixdinar == 0) {
                $produit->setPrixdinar($prixdollar * $tauxdechange);
            }
            $manager = $managerRegistry->getManager();
            $manager->persist($produit);
            $manager->flush();
            return $this->redirectToRoute('app_produit', ['produits' => $produit]);
        }
        return $this->render('produit/ajoutproduit.html.twig', [
            'formProduits' => $form->createView()]);

    }

    /**
     * @Route("/produit{idcategorie}", name="categorie_produit")
     */
    public function Produitt($idcategorie): Response
    {
        $repo = $this->getDoctrine()->getRepository(Produit::class);
        $produit = $repo->findBy(['idcategorie' => $idcategorie]);
        $repo = $this->getDoctrine()->getRepository(Categorie::class);
        $Categorie = $repo->findAll();
        return $this->render('produit/produit.html.twig', [
            'controller_name' => 'ProduitController', 'produits' => $produit, 'Categories' => $Categorie
        ]);
    }

    /**
     * @Route("/RemProduit{id}",name="RemProduit")
     */

    public function remove(Produit $produit)
    {

        $manager = $this->getDoctrine()->getManager();
        $manager->remove($produit);
        $manager->flush();
        $repo = $this->getDoctrine()->getRepository(Produit::class);
        $produit = $repo->findAll();
        return $this->redirectToRoute('app_produit', ['produitS' => $produit]);

    }
}
