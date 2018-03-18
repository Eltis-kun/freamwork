<?php
namespace app\models;

use Exception;
use vendor\core\base\Model;

class Posts extends Model
{

    public function getPosts() : ?array
    {
        try {
            $data = $this->db->queryDb("SELECT * FROM posts");
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
        if (isset($data)) {
            $result = [];
            while ($result[] = $this->db->fetch_assocDB($data)) {
            }
            return $result ?? [];
        }
        return [];
    }

    public function getPostById($string) : array
    {
        try {
            $data = $this->db->queryDb("SELECT * FROM posts WHERE id ='".$string."'");
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
        if (isset($data)) {
            $result = [];
            while ($result[] = $this->db->fetch_assocDB($data)) {
            }
            return $result[0];
        }
        return [];
    }


    public function createPost(array $array) : bool
    {
        try {
            $this->db->queryDb("INSERT INTO posts (name, img, url, status, id_list)
                   VALUES ('".$array['name']."', '".$array['img']."', '".$array['url']."', '".$array['status']."', '".$array['id_list']."');");
            return true;
        } catch (Exception $ex) {
            echo $ex->getMessage();
            return false;
        }
    }

    public function updatePost(array $array) :bool
    {
        try {
            $this->db->queryDb("UPDATE posts SET name = '".$array['name']."', img = '".$array['img']."', url = '".$array['url']."', status = '".$array['status']."', id_list = '".$array['id_list']."' WHERE id = '".$array['id']."'");
            return true;
        } catch (Exception $ex) {
            echo $ex->getMessage();
            return false;
        }
    }

    public function deletePostById(int $id)
    {
        try {
            $this->db->queryDb("DELETE FROM posts WHERE id = '".$id."'");
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function chekUrl($url)
    {
        try {
            $data = $this->db->queryDb("SELECT url FROM posts WHERE url = '".$url."'");
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
        if (isset($data)) {
            $result = [];
            while ($result[] = $this->db->fetch_assocDB($data)) {
            }
            return $result ?? [];
        }
        return [];
    }
}