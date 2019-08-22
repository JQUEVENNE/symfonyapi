<?php

namespace App\Controller;

use App\Entity\Article;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{
    /**
     * @Route("/article", name="article")
     */
    public function index()
    {
        $articleRepository = $this->getDoctrine()->getManager()->getRepository(Article::class);

        $articleRepository->findBy(['published' => true]);

        return $this->render('article/index.html.twig', [
            'articlesPublished' => $articleRepository->findBy(['published' => true]),
            'articlesNotPublished' => $articleRepository->findBy(['published' => false]),
        ]);
    }
}
