<?php

namespace App\Controller\Api;

use DateTime;
use App\Entity\User;
use App\Entity\Blog;
use App\Model\Out\Blog\BlogOut;
use App\Model\Out\Blog\BlogListOut;
use App\Model\In\Blog\BlogCreateIn;
use App\Model\In\Blog\BlogUpdateIn;
use AutoMapperPlus\AutoMapperInterface;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class BlogController extends AbstractController {

    private $autoMapper;

    private $blogRepository;

    private $entityManager;

    public function __construct(AutoMapperInterface $autoMapper, EntityManagerInterface $entityManager)
    {
        $this->autoMapper = $autoMapper;
        $this->entityManager = $entityManager;
        $this->blogRepository = $entityManager->getRepository(Blog::class);
    }

    #[Route('/api/blog', name: 'create_blog', methods: ['POST'])]
    #[ParamConverter("blogCreateIn", converter: "fos_rest.request_body")]
    public function createBlog(BlogCreateIn $blogCreateIn): Response
    {
        return $this->render('blog/index.html.twig', [
            'controller_name' => 'BlogController',
        ]);
    }

    #[Route('/api/blog/{id}', name: 'update_blog', requirements: ['id' => '\d+'], methods: ['PATCH'])]
    #[ParamConverter("blogUpdateIn", converter: "fos_rest.request_body")]
    public function updateBlog(BlogUpdateIn $blogUpdateIn, $id): Response
    {
        return $this->render('blog/index.html.twig', [
            'controller_name' => 'BlogController',
        ]);
    }

    #[Route('/api/blog/{id}', name: 'get_blog_by_id', requirements: ['id' => '\d+'], methods: ['GET'])]
    public function getBlogById($id): Response
    {
        return $this->render('blog/index.html.twig', [
            'controller_name' => 'BlogController',
        ]);
    }

    #[Route('/api/blog/title/{title}', name: 'get_blog_by_title', methods: ['GET'])]
    public function getBlogByTitle($title): Response
    {
        return $this->render('blog/index.html.twig', [
            'controller_name' => 'BlogController',
        ]);
    }

    #[Route('/api/blog/list', name: 'get_blog_list', methods: ['GET'])]
    public function getBlogList(): Response
    {
        return $this->render('blog/index.html.twig', [
            'controller_name' => 'BlogController',
        ]);
    }

    #[Route('/api/blog/{id}', name: 'delete_blog', requirements: ['id' => '\d+'], methods: ['DELETE'])]
    public function deleteBlog($id): Response
    {
        return $this->render('blog/index.html.twig', [
            'controller_name' => 'BlogController',
        ]);
    }
}
