<?php

namespace App\Controller\Api;

use DateTime;
use App\Entity\User;
use App\Model\Out\User\UserOut;
use App\Model\Out\User\UserListOut;
use App\Model\In\User\UserCreateIn;
use App\Model\In\User\UserUpdateIn;
use AutoMapperPlus\AutoMapperInterface;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class UserController extends AbstractController {

    private $autoMapper;

    private $userRepository;

    private $entityManager;

    public function __construct(AutoMapperInterface $autoMapper, EntityManagerInterface $entityManager)
    {
        $this->autoMapper = $autoMapper;
        $this->entityManager = $entityManager;
        $this->userRepository = $entityManager->getRepository(User::class);
    }

    #[Route('/api/user', name: 'create_user', methods: ['POST'])]
    #[ParamConverter("userCreateIn", converter: "fos_rest.request_body")]
    public function createUser(UserCreateIn $userCreateIn): Response
    {
        return $this->render('user/index.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }

    #[Route('/api/user/{id}', name: 'update_user', requirements: ['id' => '\d+'], methods: ['PATCH'])]
    #[ParamConverter("userUpdateIn", converter: "fos_rest.request_body")]
    public function updateUser(UserUpdateIn $userUpdateIn, $id): Response
    {
        return $this->render('user/index.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }

    #[Route('/api/user/{id}', name: 'get_user_by_id', requirements: ['id' => '\d+'], methods: ['GET'])]
    public function getUserById($id): Response
    {
        return $this->render('user/index.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }

    #[Route('/api/user/name/{name}', name: 'get_user_by_name', methods: ['GET'])]
    public function getUserByName($name): Response
    {
        return $this->render('user/index.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }

    #[Route('/api/user/email/{email}', name: 'get_user_by_email', methods: ['GET'])]
    public function getUserByEmail($email): Response
    {
        return $this->render('user/index.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }

    #[Route('/api/user/list', name: 'get_user_list', methods: ['GET'])]
    public function getUserList(): Response
    {
        return $this->render('user/index.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }

    #[Route('/api/user/{id}', name: 'delete_user', requirements: ['id' => '\d+'], methods: ['DELETE'])]
    public function deleteUser(): Response
    {
        return $this->render('user/index.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }
}
