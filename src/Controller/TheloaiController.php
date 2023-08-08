<?php

namespace App\Controller;

use App\Entity\Theloai;
use App\Form\TheloaiType;
use App\Repository\TheloaiRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/theloai')]
class TheloaiController extends AbstractController
{
    #[Route('/', name: 'app_theloai_index', methods: ['GET'])]
    public function index(TheloaiRepository $theloaiRepository): Response
    {
        return $this->render('theloai/index.html.twig', [
            'theloais' => $theloaiRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_theloai_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $theloai = new Theloai();
        $form = $this->createForm(TheloaiType::class, $theloai);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($theloai);
            $entityManager->flush();

            return $this->redirectToRoute('app_theloai_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('theloai/new.html.twig', [
            'theloai' => $theloai,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_theloai_show', methods: ['GET'])]
    public function show(Theloai $theloai): Response
    {
        return $this->render('theloai/show.html.twig', [
            'theloai' => $theloai,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_theloai_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Theloai $theloai, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(TheloaiType::class, $theloai);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_theloai_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('theloai/edit.html.twig', [
            'theloai' => $theloai,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_theloai_delete', methods: ['POST'])]
    public function delete(Request $request, Theloai $theloai, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$theloai->getId(), $request->request->get('_token'))) {
            $entityManager->remove($theloai);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_theloai_index', [], Response::HTTP_SEE_OTHER);
    }
}
