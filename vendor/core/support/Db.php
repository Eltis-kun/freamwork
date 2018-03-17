<?php
namespace vendor\core\support;

use mysqli;

class Db
{
    public $db;

    public function __construct()
    {
        $config = require ROOT . '/config/config_db.php';

        $this->db = new mysqli($config['host'], $config['user'], $config['password'], $config['dbname']);
    }

    public function queryDb($query, $resultmode = MYSQLI_STORE_RESULT)
    {
        return $query = $this->db->query($query, $resultmode = MYSQLI_STORE_RESULT);
    }

    public function fetch_assocDB($result)
    {
        return mysqli_fetch_assoc($result);
    }


}