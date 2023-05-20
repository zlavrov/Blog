<?php

namespace App;

use DateTime;

use App\Entity\Article;
use App\Model\In\Article\AbstractArticleIn;
use App\Model\In\Article\ArticleCreateIn;
use App\Model\In\Article\ArticleUpdateIn;
use App\Model\Out\Article\ArticleListOut;
use App\Model\Out\Article\ArticleOut;

use App\Entity\Blog;
use App\Model\In\Blog\AbstractBlogIn;
use App\Model\In\Blog\BlogCreateIn;
use App\Model\In\Blog\BlogUpdateIn;
use App\Model\Out\Blog\BlogListOut;
use App\Model\Out\Blog\BlogOut;

use App\Entity\Comment;
use App\Model\In\Comment\AbstractCommentIn;
use App\Model\In\Comment\CommentCreateIn;
use App\Model\In\Comment\CommentUpdateIn;
use App\Model\Out\Comment\CommentListOut;
use App\Model\Out\Comment\CommentOut;

use App\Entity\User;
use App\Model\In\User\AbstractUserIn;
use App\Model\In\User\UserCreateIn;
use App\Model\In\User\UserUpdateIn;
use App\Model\Out\User\UserListOut;
use App\Model\Out\User\UserOut;

use AutoMapperPlus\AutoMapperInterface;
use Doctrine\ORM\EntityManagerInterface;
use AutoMapperPlus\Configuration\AutoMapperConfigInterface;
use AutoMapperPlus\AutoMapperPlusBundle\AutoMapperConfiguratorInterface;

class AutoMapperConfig implements AutoMapperConfiguratorInterface {

    private $entityManager;

    private $autoMapper;

    public function __construct(AutoMapperInterface $autoMapper, EntityManagerInterface $entityManager)
    {
        $this->autoMapper = $autoMapper;
        $this->entityManager = $entityManager;
    }

    public function configure(AutoMapperConfigInterface $config): void
    {
        $this->configureArticle($config);
        $this->configureBlog($config);
        $this->configureComment($config);
        $this->configureUser($config);
    }

    // public function configure(AutoMapperConfigInterface $config): void
    // {
    //     // $this->configureTask($config);
    //     // $this->configureUser($config);
    // }

    public function configureArticle(AutoMapperConfigInterface $config): void
    {            
        // ArticleCreateIn model -> Article entity
        $config->registerMapping(ArticleCreateIn::class, Article::class);

        // ArticleUpdateIn model -> Article entity
        $config->registerMapping(ArticleUpdateIn::class, Article::class);

        // Article entity -> ArticleOut model
        $config->registerMapping(Article::class, ArticleOut::class);

        // Article entity -> ArticleListOut model
        $config->registerMapping(Article::class, ArticleListOut::class);

        // ArticleOut model -> Article entity
        $config->registerMapping(ArticleOut::class, Article::class);
        
        // ArticleListOut model -> Article entity
        $config->registerMapping(ArticleListOut::class, Article::class);
    }

    public function configureBlog(AutoMapperConfigInterface $config): void
    {            
        // BlogCreateIn model -> Blog entity
        $config->registerMapping(BlogCreateIn::class, Blog::class);

        // BlogUpdateIn model -> Blog entity
        $config->registerMapping(BlogUpdateIn::class, Blog::class);

        // Blog entity -> BlogOut model
        $config->registerMapping(Blog::class, BlogOut::class);

        // Blog entity -> BlogListOut model
        $config->registerMapping(Blog::class, BlogListOut::class);

        // BlogOut model -> Blog entity
        $config->registerMapping(BlogOut::class, Blog::class);
        
        // BlogListOut model -> Blog entity
        $config->registerMapping(BlogListOut::class, Blog::class);
    }

    public function configureComment(AutoMapperConfigInterface $config): void
    {            
        // CommentCreateIn model -> Comment entity
        $config->registerMapping(CommentCreateIn::class, Comment::class);

        // CommentUpdateIn model -> Comment entity
        $config->registerMapping(CommentUpdateIn::class, Comment::class);

        // Comment entity -> CommentOut model
        $config->registerMapping(Comment::class, CommentOut::class);

        // Comment entity -> CommentListOut model
        $config->registerMapping(Comment::class, CommentListOut::class);

        // CommentOut model -> Comment entity
        $config->registerMapping(CommentOut::class, Comment::class);
        
        // CommentListOut model -> Comment entity
        $config->registerMapping(CommentListOut::class, Comment::class);
    }

    public function configureUser(AutoMapperConfigInterface $config): void
    {            
        // UserCreateIn model -> User entity
        $config->registerMapping(UserCreateIn::class, User::class);

        // UserUpdateIn model -> User entity
        $config->registerMapping(UserUpdateIn::class, User::class);

        // User entity -> UserOut model
        $config->registerMapping(User::class, UserOut::class);

        // User entity -> UserListOut model
        $config->registerMapping(User::class, UserListOut::class);

        // UserOut model -> User entity
        $config->registerMapping(UserOut::class, User::class);

        // UserListOut model -> User entity
        $config->registerMapping(UserListOut::class, User::class);
    }

    // public function configureTask(AutoMapperConfigInterface $config): void
    // {            
    //     // TaskCreateIn model -> Task entity
    //     $config->registerMapping(TaskCreateIn::class, Task::class)
    //     ->forMember('status', function (TaskCreateIn $taskCreateIn){
    //         return Task::STATUS[$taskCreateIn->status];
    //     })
    //     ->forMember('deadline', function (TaskCreateIn $taskCreateIn) {
    //         return new DateTime($taskCreateIn->deadline);
    //     });

    //     // TaskUpdateIn model -> Task entity
    //     $config->registerMapping(TaskUpdateIn::class, Task::class)
    //     ->forMember('status', function (TaskUpdateIn $taskUpdateIn){
    //         return Task::STATUS[$taskUpdateIn->status];
    //     })
    //     ->forMember('deadline', function (TaskUpdateIn $taskUpdateIn) {
    //         return new DateTime($taskUpdateIn->deadline);
    //     });

    //     // Task entity -> TaskListOut model
    //     $config->registerMapping(Task::class, TaskListOut::class)
    //     ->forMember('status', function (Task $task){
    //         return array_flip($task::STATUS)[$task->getStatus()] ?? "undefined";
    //     })
    //     ->forMember('deadline', function (Task $task) {
    //         return $task->getDeadline()->format('Y-m-d H:i:s');
    //     });

    //     // TaskListOut model -> Task entity
    //     $config->registerMapping(TaskListOut::class, Task::class)
    //     ->forMember('status', function (TaskListOut $taskListOut){
    //         return Task::STATUS[$taskListOut->status];
    //     });
    // }

    // public function configureUser(AutoMapperConfigInterface $config): void
    // {            
    //     // UserCreateIn model -> User entity
    //     $config->registerMapping(UserCreateIn::class, User::class);

    //     // UserUpdateIn model -> User entity
    //     $config->registerMapping(UserUpdateIn::class, User::class);

    //     // User entity -> UserListOut model
    //     $config->registerMapping(User::class, UserListOut::class);

    //     // UserListOut model -> User entity
    //     $config->registerMapping(UserListOut::class, User::class);
    // }
}