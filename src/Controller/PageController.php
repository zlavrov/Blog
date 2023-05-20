<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PageController extends AbstractController
{

    #[Route('/profile', name: 'app_profile', methods: ['GET'])]
    public function profile(): Response
    {
        return $this->render('page/profile.html.twig', [
            'controller_name' => 'PageController',
        ]);
    }

    #[Route('/', name: 'app_home', methods: ['GET'])]
    public function home(): Response
    {
        return $this->render('page/home.html.twig', [
            'controller_name' => 'PageController',
        ]);
    }

    #[Route('/blog/{blog_id}', name: 'app_blog', requirements: ['id' => '\d+'], methods: ['GET'])]
    public function blog($blog_id): Response
    {
        return $this->render('page/blog.html.twig', [
            'controller_name' => 'PageController',
        ]);
    }

    #[Route('/article/{article_id}/from/blog/{blog_id}', name: 'app_article', requirements: ['id' => '\d+'], methods: ['GET'])]
    public function article($article_id, $blog_id): Response
    {
        return $this->render('page/article.html.twig', [
            'controller_name' => 'PageController',
        ]);
    }




    #[Route('/page', name: 'app_page')]
    public function index(): Response
    {
        return $this->render('page/index.html.twig', [
            'controller_name' => 'PageController',
        ]);
    }
}
