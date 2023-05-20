<?php

namespace App\Controller;

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

    #[Route('/blog', name: 'create_blog', methods: ['POST'])]
    #[ParamConverter("blogCreateIn", converter: "fos_rest.request_body")]
    public function createBlog(BlogCreateIn $blogCreateIn): Response
    {
        return $this->render('blog/index.html.twig', [
            'controller_name' => 'BlogController',
        ]);
    }

    #[Route('/blog/{id}', name: 'update_blog', requirements: ['id' => '\d+'], methods: ['PATCH'])]
    #[ParamConverter("blogUpdateIn", converter: "fos_rest.request_body")]
    public function updateBlog(BlogUpdateIn $blogUpdateIn, $id): Response
    {
        return $this->render('blog/index.html.twig', [
            'controller_name' => 'BlogController',
        ]);
    }

    #[Route('/blog/{id}', name: 'get_blog_by_id', requirements: ['id' => '\d+'], methods: ['GET'])]
    public function getBlogById($id): Response
    {
        return $this->render('blog/index.html.twig', [
            'controller_name' => 'BlogController',
        ]);
    }

    #[Route('/blog/title/{title}', name: 'get_blog_by_title', methods: ['GET'])]
    public function getBlogByTitle($title): Response
    {
        return $this->render('blog/index.html.twig', [
            'controller_name' => 'BlogController',
        ]);
    }

    #[Route('/blog/list', name: 'get_blog_list', methods: ['GET'])]
    public function getBlogList(): Response
    {
        return $this->render('blog/index.html.twig', [
            'controller_name' => 'BlogController',
        ]);
    }

    #[Route('/blog/{id}', name: 'delete_blog', requirements: ['id' => '\d+'], methods: ['DELETE'])]
    public function deleteBlog($id): Response
    {
        return $this->render('blog/index.html.twig', [
            'controller_name' => 'BlogController',
        ]);
    }

    #[Route('/create/blog', name: 'show_blog_post_form', methods: ['GET'])]
    public function showBlogPostForm(): Response
    {
        return $this->render('blog/index.html.twig', [
            'controller_name' => 'BlogController',
        ]);
    }

    #[Route('/update/blog', name: 'show_blog_patch_form', methods: ['GET'])]
    public function showBlogPatchForm(): Response
    {
        return $this->render('article/index.html.twig', [
            'controller_name' => 'ArticleController',
        ]);
    }
}
