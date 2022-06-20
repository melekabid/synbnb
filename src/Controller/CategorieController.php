<?php

namespace App\Controller;

use App\Entity\Categorie;
use App\Entity\Client;
use App\Entity\Proforma;
use App\Form\CategorieType;
use Symfony\Bridge\Doctrine\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategorieController extends AbstractController
{


    /**
     * @Route("/categorie", name="app_categorie")
     */
    public function index( ): Response
    {
        $repo=$this->getDoctrine()->getRepository(Categorie::class);
        $categorie=$repo->findAll();





        return $this->render('categorie/categorie.html.twig', [
            'controller_name' => 'CategorieController', 'categories' => $categorie
        ]);
    }

    /**
     * @Route("/categorienouveau", name="categorie_create")
     * @Route("/categorie{id}", name="categorie_edit")
     */
    public function form(Request $request,Categorie $categorie = null,\Doctrine\Persistence\ManagerRegistry $managerRegistry) {

        if(!$categorie)
        {
          $categorie = new Categorie();
        }
        $form = $this->createForm(CategorieType::class,$categorie);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){

            $manager = $managerRegistry->getManager();
            $manager->persist($categorie);
            $manager->flush();
            return $this->redirectToRoute('app_categorie',['categories'=> $categorie]);


        }

        return $this-> render('categorie/create.html.twig',
            ['formCategorie' => $form->createView()]);
    }
    /**


     *@Route("/RemCategorie{id}",name="RemCategorie")
     */

    public function remove(Categorie $categorie){

        $manager=$this->getDoctrine()->getManager();
        $manager->remove($categorie);
        $manager->flush();
        $repo=$this->getDoctrine()->getRepository(Client::class);
        $categorie=$repo->findAll();
        return $this->redirectToRoute('app_categorie',['categories'=> $categorie]);

    }
}
