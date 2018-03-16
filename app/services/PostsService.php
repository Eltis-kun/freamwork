<?php

namespace app\services;

use app\models\Posts;


class PostsService
{
    public $postModel;

    public function __construct()
    {
        $this->postModel = new Posts;
    }

    public function getPosts() :array
    {
        return $this->postModel->getPosts();
    }

    public function getPostById(array $array) :array
    {
        return $this->postModel->getPostById($array);
    }

    public function createPost(array $array) :bool
    {
        return $this->postModel->createPost($array);
    }

    public function updatePost(array $array) :bool
    {
        return $this->postModel->updatePost($array);
    }

    public function deletePostById(array $array) :bool
    {
        return $this->postModel->deletePostById($array);
    }


}

