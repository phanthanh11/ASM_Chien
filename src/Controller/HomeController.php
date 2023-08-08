<?php

namespace App\Controller;

use App\Entity\Book;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_hone')]
    public function listAction(ManagerRegistry $doctrine): Response
    {
        $book = $doctrine->getRepository(book::class)->findBy([],[],6);
        return $this->render('home/index.html.twig', ['book' => $book]);
    }
}
