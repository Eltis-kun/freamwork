<?php

namespace vendor\core\base;

use vendor\core\support\Db;

abstract class Model
{
    public $db;

    public function __construct() {
        $this->db = new Db();
    }

}