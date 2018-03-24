<?php

namespace app\controllers;

use vendor\core\base\Controller;
use app\services\PostsService;

class Main extends Controller
{
    private $postService;

    function __construct($route)
    {
        parent::__construct($route);
        $this->postService = new PostsService();
    }

    public function indexAction()
    {
        $data = $this->postService->getPosts();
                $this->view->generate($data, '/../index.php');
    }
}