<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactcmdController extends AbstractController
{
    #[Route('/contactcmd', name: 'app_contactcmd')]
    public function index(): Response
    {
        return $this->render('contactcmd/index.html.twig', [
            'controller_name' => 'ContactcmdController',
        ]);
    }
}
