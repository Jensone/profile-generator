<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Edit the controller to suit your needs.
 * Use your `security.yaml` file to restrict
 * access to authenticated users or you can 
 * also use the isGranted() method to restrict 
 * access to authenticated users in your app.
 */

// #[isGranted('IS_AUTHENTICATED_FULLY')]
class ProfileController extends AbstractController
{
    #[Route('/profile', name: 'profile', methods: ['GET'])]
    public function profile(): Response
    {
        return $this->render('profile/account.html.twig');
    }
}