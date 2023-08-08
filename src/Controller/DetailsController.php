<?php

namespace App\Controller;

use App\Entity\Book;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class DetailsController extends AbstractController
{
    #[Route('/details/{id}', name: 'app_details')]
    public function detailsAction(ManagerRegistry $doctrine, $id): Response
    {
        $book = $doctrine->getRepository(Book::class)->find($id);

        if (!$book) {
            throw $this->createNotFoundException('Book not found');
        }

        return $this->render('details/index.html.twig', [
            'book' => $book,
        ]);
    }
}
