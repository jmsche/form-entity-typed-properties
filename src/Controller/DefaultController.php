<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Post;
use App\Form\Type\PostType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class DefaultController extends AbstractController
{
    #[Route('', name: 'index')]
    public function index(Request $request): Response
    {
        $post = new Post();
        $form = $this->createForm(PostType::class, $post, [
            'method' => 'POST',
            'action' => $this->generateUrl('index'),
        ]);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            dump($post->getCategory());
            if ($form->isValid()) {

            }
        }

        return $this->renderForm('index.html.twig', ['form' => $form]);
    }
}
