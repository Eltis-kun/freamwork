<?php


namespace app\models;


use Exception;
use vendor\core\base\Model;

class Admin extends Model
{

    public function getUser(string $login) : array
    {
        try {

            $data = $this->db->queryDb("SELECT * FROM users WHERE users.login ='".$login."'");

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
}
