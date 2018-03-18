<?php

namespace app\services;

use app\components\Resize;
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

    public function getPostById(string $string) :array
    {
        return $this->postModel->getPostById($string);
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

    public function chekUrl($url)
    {
        if ($this->postModel->chekUrl($url)) {
            return true;
        } else {
            return false;
        }
    }

    public function saveImg(array $data)
    {
        $path = 'images/';
        $file = explode('.',$_FILES['img']['name']);
        $ext = array_pop($file);
        $new_name = time().'.'.$ext;
        $full_path = $path.$new_name;

        if($_FILES['img']['error'] == 0) {
            if(move_uploaded_file($_FILES['img']['tmp_name'], $full_path)){
                $resizeObj = new Resize($full_path);
                $resizeObj -> resizeImage(600, 400, 'crop');
                $resizeObj -> saveImage($full_path, 100);
                $data['img'] = $full_path;
                return $data;
            }
        } else {
            echo 'Файл на загружен';
        }
    }
}

