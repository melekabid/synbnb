<?php

namespace App\Controller;

use App\Entity\Client;
use App\Entity\Produit;
use App\Entity\Proforma;
use App\Entity\Categorie;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class IndexController extends AbstractController
{
    /**
     * @Route("/index", name="app_index")
     */
    public function index(): Response
    {
        $repo = $this->getDoctrine()->getRepository(Categorie::class);
        $categorie = $repo->findAll();
        $repo = $this->getDoctrine()->getRepository(Proforma::class);
        $Proforma = $repo->findAll();
        $repo = $this->getDoctrine()->getRepository(Produit::class);
        $Produit = $repo->findAll();
        $repo1 = $this->getDoctrine()->getRepository(Client::class);
        $clients = $repo1->findAll();
        $sumdolaar = 0;
        $suma = 0;
        foreach ($Proforma as $proforma) {
            if ($proforma->getChecked() == true) {
                if ($proforma->getChoix() == 3 || $proforma->getChoix() == 4) {
                    $sumdolaar = $sumdolaar + $proforma->getPrixtotal();
                }
                $suma = $suma + $proforma->getPrixtotal();
            }

        }

        $catNom = [];
        $nbr = [];
        $backgroundcol = [];
        $bordercol = [];

        foreach ($categorie as $cat) {
            $catNom[] = $cat->getNomcategorie();
        }


        foreach ($catNom as $cat) {
            $nb = 0;
            foreach ($Proforma as $proforma) {

                foreach ($proforma->getProducts() as $product) {
                    if ($product->getIdcategorie()->getNomcategorie() == $cat) {
                        $nb++;
                    }
                }
            }
            $nbr[] = $nb;

        }

        $firstProducts = [];
        $finalProducts = [];
        $firstNumber = [];
        $finalNumber = [];
        foreach ($Produit as $prod) {
            $firstProducts[] = $prod->getReference();
        }

        foreach ($firstProducts as $first) {
            $nb1 = 0;
            foreach ($Proforma as $proforma) {

                foreach ($proforma->getProducts() as $product) {
                    if ($product->getReference() == $first) {
                        $nb1++;
                    }
                }
            }
            $firstNumber[] = $nb1;
        }

        for ($i = 0; $i < count($firstNumber); $i++) {
            for ($j = $i + 1; $j < count($firstNumber); $j++) {
                if ($firstNumber[$j] > $firstNumber[$i]) {
                    $temp = $firstNumber[$i];
                    $firstNumber[$i] = $firstNumber[$j];
                    $firstNumber[$j] = $temp;


                    $temp1 = $firstProducts[$i];
                    $firstProducts[$i] = $firstProducts[$j];
                    $firstProducts[$j] = $temp1;
                }
            }
        }

        for ($i = 0; $i < 5; $i++) {
            $finalProducts[] = $firstProducts[$i];
            $finalNumber[] = $firstNumber[$i];
            $backgroundcol[] = 'rgba(75, 192, 192, 0.2)';
            $bordercol[] = 'rgb(75, 192, 192)';
        }


        return $this->render('index/index.html.twig', [
            'controller_name' => 'IndexController', 'categories' => $categorie, 'proformas' => $Proforma,
            'produits' => $Produit,
            'nomCat' => json_encode($catNom),
            'nbr' => json_encode($nbr),
            'color' => json_encode($backgroundcol),
            'bordercolor' => json_encode($bordercol),
            'clients' => $clients,
            'finalproducts' => json_encode($finalProducts),
            'finalNumber' => json_encode($finalNumber),
            'sum' => $suma,
            'sumdolaar' => $sumdolaar
        ]);
    }
}
