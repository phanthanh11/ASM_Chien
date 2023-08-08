<?php

namespace App\Controller;

use App\Entity\Book;
use App\Entity\Tacgia;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Form\BookType;


class BookController extends AbstractController
{
    #[Route('/admin', name: 'shop_list')]
    public function listAction(ManagerRegistry $doctrine): Response
    {
        $book = $doctrine->getRepository(book::class)->findAll();
        return $this->render('book/index.html.twig', ['book' => $book]);
    }
#[Route('/shop/details/{id}', name: 'shop_details', methods: ['GET'])]
    public function detailsAction(ManagerRegistry $doctrine, $id): Response
    {
        $book = $doctrine->getRepository(Book::class)->find($id);

        if (!$book) {
            throw $this->createNotFoundException('Book not found');
        }

        $tacgia = $book->getTacgia(); // Assuming the method to retrieve the related Tacgia entity is 'getTacgia()'

        return $this->render('book/details.html.twig', ['book' => $book, 'tacgia' => $tacgia]);
    }
    #[Route("/shop/delete/{id}", name: 'shop_delete', methods: ["GET"])]
    public function deleteAction(ManagerRegistry $doctrine, $id): Response
    {
        $entityManager = $doctrine->getManager();
        $book = $entityManager->getRepository(book::class)->find($id);



        $entityManager->remove($book);
        $entityManager->flush();

        $this->addFlash('success', ' book deleted');
        return $this->redirectToRoute('shop_list');
    }
    #[Route("/shop/create", name: 'shop_create', methods: ['GET','POST'])]
    public function createAction(Request $request, SluggerInterface $slugger, ManagerRegistry $registry): Response
    {
        $book = new Book();

        $form = $this->createForm(BookType::class, $book);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Process and persist the data to the database
            $entityManager = $registry->getManager();
            $entityManager->persist($book);
            $entityManager->flush();

            $this->addFlash('success', 'Book created successfully.');
            return $this->redirectToRoute('shop_list');
        }

        return $this->render('book/create.html.twig', [
            'form' => $form->createView(),
            'book' => $book,
        ]);
    }
    #[Route("/edit/{id}", name:"shop_edit", methods: ['GET', 'POST'])]
    public function editAction(ManagerRegistry $doctrine, $id, Request $request, SluggerInterface $slugger): Response
    {
        $entityManager = $doctrine->getManager();
        $book = $entityManager->getRepository(Book::class)->find($id);

        if (!$book) {
            throw $this->createNotFoundException('Book not found');
        }

        $form = $this->createForm(BookType::class, $book);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush(); // Save the changes

            $this->addFlash('success', 'Book updated successfully.');
            return $this->redirectToRoute('shop_list');
        }

        return $this->render('book/edit.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
