<?php

namespace App\Controller;

use App\Form\ProformaupdateType;
use Symfony\Component\HttpFoundation\JsonResponse;
use Dompdf\Dompdf;
use Dompdf\Options;
use App\Entity\Proforma;
use App\Form\ProformaType;
use App\Entity\BackupProduit;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProformatController extends AbstractController
{
    /**
     * @Route("/cheque", name="cheque")
     */
    public function eatAction(Request $request)
    {

        // Is it an Ajax Request ?
        if (!$request->isXmlHttpRequest())
            return new JsonResponse(array('status' => 'Error1'),400);

        // Request has request data ?
        if (!isset($request->request))
            return new JsonResponse(array('status' => 'Error2'),400);

        // Get data
        $checked = $request->get('checked');
        $facture_id = $request->get('facture_id');

        // Is the data correct ?
        if ($checked != 0 && $checked != 1)
            return new JsonResponse(array('status' => 'Error3'),400);
        $repo=$this->getDoctrine()->getRepository(Proforma::class);
        $cookie=$repo->findBy(['id'=>$facture_id]);
        // Does the cookie object exist ?

        if ($cookie === null)
            return new JsonResponse(array('status' => 'Error'), 400);

        foreach($cookie as $back)
        {
            $manager = $this->getDoctrine()->getManager();
            $back->setChecked($checked);
            $manager->persist($back);
            $manager->flush();
        }

        // All seems fine ! Eat the cookie !

        // Save the data to the database


        // Inform user that all went well
        return new JsonResponse(array('status' => 'Done'),200);
    }
    /**
     * @Route("/proformat{id}", name="app_proformat")
     */
    public function index(Proforma $facture): Response
    {

        $sum7 =0;
        $sum19 =0;
        $repo=$this->getDoctrine()->getRepository(BackupProduit::class);
        $backups=$repo->findBy(['idFacture'=>$facture->getId()]);
       $prixtotal = 0;
        $sumtotal =0;

        foreach($backups as $back)
        {
            $sumtotal = $sumtotal + ($back->getPrixTotal()*(100+$back->getTva())/100);

            $prixtotal = $prixtotal + $back->getPrixTotal();

            if($facture->getChoix()== 2 || $facture->getChoix()== 5  )
            {
                if($back->getTva()==7)
                {

                    $sum7= $sum7 + (($back->getPrixTotal()*$back->getTva())/100);
                }
                if($back->getTva()==19)
                {
                    $sum19= $sum19 + (($back->getPrixTotal()*$back->getTva())/100);
                }


            }

        }
        $manager = $this->getDoctrine()->getManager();
        if($facture->getChoix()== 2 || $facture->getChoix()== 5  ) {
            $facture->setPrixtotalht($prixtotal);
            $facture->setPrixTotal($sumtotal + 0.600);
        }
        elseif ($facture->getChoix()== 3 || $facture->getChoix()== 4 )
        {
            $facture->setPrixTotal($prixtotal);
        }
        else{
            $facture->setPrixtotalht($prixtotal);
        }
        $manager->persist($facture);
        $manager->flush();
        
        return $this->render('proformat/index.html.twig', [
            'facture' => $facture, 'sum7'=>$sum7,'sum19'=>$sum19,'list' => $backups
        ]);
    }
    /**
     * @Route("/pdf{id}", name="pdf")
     */
    public function pdf(Proforma $facture)
    {
        $manager = $this->getDoctrine()->getManager();
        $sum7 =0;
        $sum19 =0;
        $repo=$this->getDoctrine()->getRepository(BackupProduit::class);
        $backups=$repo->findBy(['idFacture'=>$facture->getId()]);


        foreach($backups as $back)
        {
            if($facture->getChoix()== 2 || $facture->getChoix()== 5  )
            {
                if($back->getTva()==7)
                {

                    $sum7= $sum7 + (($back->getPrixTotal()*$back->getTva())/100);
                }
                if($back->getTva()==19)
                {
                    $sum19= $sum19 + (($back->getPrixTotal()*$back->getTva())/100);
                }


            }

        }



            // Retrieve the HTML generated in our twig file
        return $this->render('proformat/pdf.html.twig', [
            'facture' => $facture, 'sum7'=>$sum7,'sum19'=>$sum19,'list' => $backups
        ]);


    }

    /**
     * @Route("/backup{id}", name="backup")
     */
    public function afficherBackup(Proforma $facture,Request $request): Response
    {
        dump($request);
        $manager = $this->getDoctrine()->getManager();
        $backupList = [];
 if($request->request->count() > 0){
        foreach($facture->getProducts() as $product)
        {
            $backup = new BackupProduit(); 
            $backup->setIdFacture($facture);
            $backup->setIdClient($facture->getIdclient());
            $backup->setIdProduit($product);
            $backup->setQuantity(intval($request->request->get('Qte'.$product->getReference())));
            if($facture->getChoix()==3 || $facture->getChoix()==4) {
                $backup->setPrixTotalHt($product->getPrixdollar()*(100+$facture->getIdclient()->getPourcentagebenifice())/100);
            }
            else{
                $backup->setPrixTotalHt($product->getPrixdinar()*(100+$facture->getIdclient()->getPourcentagebenifice())/100);
            }
            $backup->setPrixTotal($backup->getPrixTotalHt()*intval($request->request->get('Qte'.$product->getReference())));
            $backup->setTva($product->getTva());
            $manager->persist($backup);
            $backupList[] = $backup;
        }
        $manager->flush();
        return  $this->redirectToRoute('app_proformat',[
            'id' => $facture->getId(),
            'list' => $backupList
        ]);
    }

        
        return $this->render('proformat/ajoutBackup.html.twig',[
            'facture' => $facture
        ]);
    }

    /**
     * @Route("/ajouterProformat", name="add_proformat")
     * @Route("/profoma/{id}/proformaedit", name="edit_allo")
     */
    public function ajouterProformat( Proforma $facture = null, Request $request)
    {
        if(!$facture)
        {
            $facture = new Proforma();
        }
       //$facture = new Facture();
       $form = $this->createForm(ProformaType::class, $facture);
       $form->handleRequest($request);
       $manager = $this->getDoctrine()->getManager();
       if ($form->isSubmitted() && $form->isValid()) {
           $facture->setPrixTotal(0);
           $facture->setPrixtotalht(0);
           $facture->setDate(new \DateTime());

           $facture->setChecked(false);
           $manager->persist($facture);
           $manager->flush();

           return  $this->redirectToRoute('backup',['id' => $facture->getId()]);
       }
        
        
        return $this->render('proformat/ajouterProformat.html.twig', [
            'controller_name' => 'ProformatController',
            'formf' => $form->createView()
            
        ]);
    }
    /**
   * @Route("/profomaedit{id}", name="edit_allo")
   */
    public function editProformat(Proforma $facture = null, Request $request)
    {
        if(!$facture)
        {
            $facture = new Proforma();
        }
        //$facture = new Facture();
        $form = $this->createForm(ProformaupdateType::class, $facture);
        $form->handleRequest($request);
        $manager = $this->getDoctrine()->getManager();
        if ($form->isSubmitted() && $form->isValid()) {

            $manager->persist($facture);
            $manager->flush();
            return  $this->redirectToRoute('show_proformat');

        }


        return $this->render('proformat/editProforma.html.twig', [
            'controller_name' => 'ProformatController',
            'formf' => $form->createView()

        ]);
    }


     /**
     * @Route("/afficherProformat", name="show_proformat")
     */
    public function afficherProformat(): Response
    {

        $repo=$this->getDoctrine()->getRepository(Proforma::class);
        $factures=$repo->findAll();
        $datedeaujourdhui = new \DateTime();

        return $this->render('proformat/afficherProformat.html.twig', [
            'controller_name' => 'ProformatController',
            'factures' => $factures, 'datedeaujourdhui'=>  $datedeaujourdhui,
        ]);
    }










}
