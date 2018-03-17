<?php

namespace app\controllers;

use app\services\AuthService;
use app\services\PostsService;
use app\services\ImageService;
use vendor\core\base\Controller;

class Posts extends Controller
{
    private $authService;
    private $postService;
    private $imageSevice;

    public function __construct()
    {
        parent::__construct([]);
        $this->authService = new AuthService();
        $this->postService = new PostsService();
        $this->imageSevice = new ImageService();
    }

    public function indexAction()
    {
        var_dump(45);
        $posts = $this->postService->getPosts();
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
            dd($data); die;
            if ($this->postService->createPost($this->postService->saveImg($data))) {
                header("Location: /admin/posts");
            }

        } else {
            header("Location: /admin/login");
        }
    }

    public function deleteAction()
    {
        if ($this->authService->isAuth()) {
            if ($_POST['id']) {
                $this->postService->deletePostById($_POST['id']);
            }
            header("Location: /admin/posts");
        } else {
            header("Location: /admin/login");
        }

    }

    public function redactionAction()
    {
        $this->view->generate([], 'Admin/posts_create.php');
    }

}