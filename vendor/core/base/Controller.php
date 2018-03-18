<?php

namespace vendor\core\base;


abstract class Controller
{
    public $model;
    public $view;
    public $route;


    function __construct($route)
    {
        $this->route = $route;
        $this->view = new View($route);

    }


}