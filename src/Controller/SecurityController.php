<?php

namespace App\Controller;

use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    /**
     * @return Response
     */
    #[Route('/login', name: 'app_login')]
   public function login(AuthenticationUtils $authenticationUtils): Response
   {
       return $this->render('security/login.html.twig', [
           'error' => $authenticationUtils->getLastAuthenticationError()
       ]);
   }
    /**
     * @Route("/logout", name="app_logout")
     */
    public function logout()
    {
        throw new Exception('logout() should never be reached');
    }
}

