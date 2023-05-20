<?php

namespace App\Controller\Api;

use DateTime;
use App\Entity\User;
use App\Entity\Article;
use App\Model\Out\Article\ArticleOut;
use App\Model\Out\Article\ArticleListOut;
use App\Model\In\Article\ArticleCreateIn;
use App\Model\In\Article\ArticleUpdateIn;
use AutoMapperPlus\AutoMapperInterface;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class ArticleController extends AbstractController {

    private $autoMapper;

    private $articleRepository;

    private $entityManager;

    public function __construct(AutoMapperInterface $autoMapper, EntityManagerInterface $entityManager)
    {
        $this->autoMapper = $autoMapper;
        $this->entityManager = $entityManager;
        $this->articleRepository = $entityManager->getRepository(Article::class);
    }

    #[Route('/api/article', name: 'create_article', methods: ['POST'])]
    #[ParamConverter("articleCreateIn", converter: "fos_rest.request_body")]
    public function createArticle(ArticleCreateIn $articleCreateIn): Response
    {
        return $this->render('article/index.html.twig', [
            'controller_name' => 'ArticleController',
        ]);
    }

    #[Route('/api/article/{id}', name: 'update_article', requirements: ['id' => '\d+'], methods: ['PATCH'])]
    #[ParamConverter("articleUpdateIn", converter: "fos_rest.request_body")]
    public function updateArticle(ArticleUpdateIn $articleUpdateIn, $id): Response
    {
        return $this->render('article/index.html.twig', [
            'controller_name' => 'ArticleController',
        ]);
    }

    #[Route('/api/article/{id}', name: 'get_article_by_id', requirements: ['id' => '\d+'], methods: ['GET'])]
    public function getArticleById($id): Response
    {
        return $this->render('article/index.html.twig', [
            'controller_name' => 'ArticleController',
        ]);
    }

    #[Route('/api/article/title/{title}', name: 'get_article_by_title', methods: ['GET'])]
    public function getArticleByTitle($title): Response
    {
        return $this->render('article/index.html.twig', [
            'controller_name' => 'ArticleController',
        ]);
    }

    #[Route('/api/article/list', name: 'get_article_list', methods: ['GET'])]
    public function getArticleList(): Response
    {
        return $this->render('article/index.html.twig', [
            'controller_name' => 'ArticleController',
        ]);
    }

    #[Route('/api/article/{id}', name: 'delete_article', requirements: ['id' => '\d+'], methods: ['DELETE'])]
    public function deleteArticle($id): Response
    {
        return $this->render('article/index.html.twig', [
            'controller_name' => 'ArticleController',
        ]);
    }
}
