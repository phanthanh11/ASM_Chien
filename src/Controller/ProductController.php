<?php

namespace App\Controller;

use App\Entity\Book;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    #[Route('/product', name: 'app_productuser')]
    public function listAction(ManagerRegistry $doctrine): Response
    {
        $book = $doctrine->getRepository(book::class)->findAll();
        return $this->render('product/index.html.twig', ['book' => $book]);
    }
}
