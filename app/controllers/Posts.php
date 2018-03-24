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
            if($this->authService->isAuth()) {
                return;
            } else {
                header("Location: /admin/login");
            }
    }

    public function indexAction()
    {
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
                'img' => $_FILES['img']['name'],
                'url' => $_POST['url'],
                'status' => $_POST['status'],
                'id_list' => $_POST['id_list']
            ];
            $this->postService->chekUrl($data['url']);

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

    public function editAction()
    {
        if ($this->authService->isAuth()) {
            if (isset($_POST['id']) && !empty($_POST['id'])) {
                $data = $this->postService->getPostById($_POST['id']);
                $this->view->generate($data, 'Admin/posts_update.php');
            }
        } else {
            header("Location: /admin/login");
        }
    }

    public function updateAction()
    {
        if (isset($_POST['name'],$_POST['url'],$_POST['status'],$_POST['id_list'],$_FILES['img'])) { //todo check it in validator
            $data = [
                'id' => $_POST['id'],
                'name' => $_POST['name'],
                'img' => $_FILES['img'],
                'url' => $_POST['url'],
                'status' => $_POST['status'],
                'id_list' => $_POST['id_list']
            ];
            if ($this->postService->chekUrl($_POST['url']))
            {
                $this->view->generate('url', 'Admin/error_page.php');//todo  generate error page
            } else {
            $data = $this->postService->saveImg($data);
            $res = $this->postService->updatePost($data);
            dd($res);die;
            if($res) {
                header("Location: /admin/posts");
            }//todo else - show error message
        }
        }
    }
}