<?php

namespace App\Controller;

use DateTime;
use App\Entity\User;
use App\Entity\Comment;
use App\Model\Out\Comment\CommentOut;
use App\Model\Out\Comment\CommentListOut;
use App\Model\In\Comment\CommentCreateIn;
use App\Model\In\Comment\CommentUpdateIn;
use AutoMapperPlus\AutoMapperInterface;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class CommentController extends AbstractController {

    private $autoMapper;

    private $commentRepository;

    private $entityManager;

    public function __construct(AutoMapperInterface $autoMapper, EntityManagerInterface $entityManager)
    {
        $this->autoMapper = $autoMapper;
        $this->entityManager = $entityManager;
        $this->commentRepository = $entityManager->getRepository(Comment::class);
    }

    #[Route('/comment', name: 'create_comment', methods: ['POST'])]
    #[ParamConverter("commentCreateIn", converter: "fos_rest.request_body")]
    public function createComment(CommentCreateIn $commentCreateIn): Response
    {
        return $this->render('comment/index.html.twig', [
            'controller_name' => 'CommentController',
        ]);
    }

    #[Route('/comment/{id}', name: 'update_comment', requirements: ['id' => '\d+'], methods: ['PATCH'])]
    #[ParamConverter("commentUpdateIn", converter: "fos_rest.request_body")]
    public function updateComment(CommentUpdateIn $commentUpdateIn, $id): Response
    {
        return $this->render('comment/index.html.twig', [
            'controller_name' => 'CommentController',
        ]);
    }

    #[Route('/comment/{id}', name: 'get_comment_by_id', requirements: ['id' => '\d+'], methods: ['GET'])]
    public function getCommentById($id): Response
    {
        return $this->render('comment/index.html.twig', [
            'controller_name' => 'CommentController',
        ]);
    }

    #[Route('/comment/list', name: 'get_comment_list', methods: ['GET'])]
    public function getCommentList(): Response
    {
        return $this->render('comment/index.html.twig', [
            'controller_name' => 'CommentController',
        ]);
    }

    #[Route('/comment/{id}', name: 'delete_comment', requirements: ['id' => '\d+'], methods: ['DELETE'])]
    public function deleteComment($id): Response
    {
        return $this->render('comment/index.html.twig', [
            'controller_name' => 'CommentController',
        ]);
    }

    #[Route('/create/comment', name: 'show_comment_post_form', methods: ['GET'])]
    public function showCommentPostForm(): Response
    {
        return $this->render('comment/index.html.twig', [
            'controller_name' => 'CommentController',
        ]);
    }

    #[Route('/update/comment', name: 'show_comment_patch_form', methods: ['GET'])]
    public function showCommentPatchForm(): Response
    {
        return $this->render('comment/index.html.twig', [
            'controller_name' => 'CommentController',
        ]);
    }
}
