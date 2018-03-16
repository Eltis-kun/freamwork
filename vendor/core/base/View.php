<?php

namespace vendor\core\base;


class View
{
    public $path;

    public function __construct($route) {

        $this->path = $route['controller'].'/';
    }

    function generate($data, $template_view = false)
    {
        if (!$template_view) {
            $template_view = 'index.php';
        }

        include VIEWS.$this->path.$template_view;
    }

}