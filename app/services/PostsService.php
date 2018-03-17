<?php

namespace app\services;

use app\components\resize;
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

    public function deletePostById(int $id)
    {
        $this->postModel->deletePostById($id);
    }

    public function saveImg(array $data)
    {
        $path = 'images/';
        $ext = array_pop(explode('.',$_FILES['img']['name']));
        $new_name = time().'.'.$ext;
        $full_path = $path.$new_name;

        if($_FILES['img']['error'] == 0) {
            if(move_uploaded_file($_FILES['img']['tmp_name'], $full_path)){
                $resizeObj = new resize($full_path);
                $resizeObj -> resizeImage(150, 100, 'crop');
                $resizeObj -> saveImage($full_path, 100);
                $data['img'] = $full_path;
                return $data;
            }
        } else {
            echo 'Файл на загружен';
        }
    }
}

