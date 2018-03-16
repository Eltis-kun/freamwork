<?php

namespace app\Routes;

class Routs
{

    public static function getRouts()
    {
        return [
            'admin/posts' => 'Posts@index',
            'admin/posts/create' => 'Posts@create',
            'admin/posts/store' => 'Posts@store'
        ];
    }

}