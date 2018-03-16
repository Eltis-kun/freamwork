<?php

namespace app\controllers;

use app\services\AuthService;
use app\services\PostsService;
use vendor\core\base\Controller;

class Posts extends Controller
{
    private $authService;
    private $postService;

    public function __construct()
    {
        parent::__construct([]);
        $this->authService = new AuthService();
        $this->postService = new PostsService();
    }

    public function indexAction()
    {
        // todo get all posts
        $posts = [];
        $posts[] = [
            'id' => 1,
            'name' => 'lol-kek-name',
            'img' => 'lol-img-address',
            'url' => 'lol-url',
            'status' => true,
            'id_list' => 2
        ];
        $this->view->generate(['posts' => $posts], 'Admin/posts_index.php');
    }

    public function createAction()
    {
        $this->view->generate([], 'Admin/posts_create.php');
    }

    public function storeAction()
    {
        if ($this->authService->isAuth()) {

            $data = [
                'name' => $_POST['name'],
                'img' => $_FILES['img']['name'], //todo remove ['name']
                'url' => $_POST['url'],
                'status' => $_POST['status'],
                'id_list' => $_POST['id_list']
            ];

            $this->postService->createPost($data);
        } else {
            header("Location: /admin/login");
        }
    }
}