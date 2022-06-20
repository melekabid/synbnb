<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LoginController extends AbstractController
{
    /**
     * @Route("/", name="app_login")
     */
    public function index(Request $request): Response
    {
        $form = $this->createForm(UserType::class);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $username= $form->get('username')->getData();
            $password = $form->get('password')->getData();
           if($username =='ste.sacoges@gmail.com' && $password=='Sacoges123') {
               return $this->redirectToRoute('app_index');
           }


        }
        return $this->render('login/index.html.twig', [
            'controller_name' => 'LoginController','formuser' => $form->createView()
        ]);
    }
}
