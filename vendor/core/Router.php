<?php

namespace vendor\core;

use vendor\core\base;

class Router
{
    protected static $rules = [];
    protected static $route = [];
    protected static $routes = [];

    public static function add($regexp, $route = [])
    {
        self::$rules[$regexp] = $route;
    }
    
    public static function addRoutes($routs)
    {
        self::$routes = $routs;
    }

    public static function getRoutes()
    {
        return self::$rules;
    }

    public static function getRoute()
    {
        return self::$route;
    }

    private static function matchRoute($url)
    {
        foreach (self::$rules as $pattern => $route) {
            if (preg_match("#$pattern#i", $url, $matches)) {
                foreach ($matches as $k => $v) {
                    if (is_string($k)) {
                        $route[$k] = $v;
                    }
                }
                if (!isset($route['action'])) {
                    $route['action'] = 'index';
                }
                self::$route = $route;
                self::$route['controller'] = self::upperCamelCase($route['controller']);
                return true;
            }
        }
        return false;
    }

    public static function dispatch($url)
    {

        if (isset(self::$routes[$url])) {
            $control = explode('@', self::$routes[$url]);

            $controller = 'app\controllers\\' . $control[0];
            if (class_exists($controller)) {
                $cObj = new $controller();
            } else {
                return;
            }

            $action = $control[1].'Action';
            if (method_exists($cObj, $action)) {
                $cObj->$action();
            }
            return;
        }

        if (self::matchRoute($url)) {
            $controller = 'app\controllers\\' . self::$route['controller'];
            if (class_exists($controller)) {
                $cObj = new $controller(self::$route);
                $action = self::lowerCamelCase(self::$route['action'] . 'Action');
                if (method_exists($cObj, $action)) {
                    $cObj->$action();
                } else {
                    echo 'Нет такого метода';
                }
            } else {
                echo 'Контроллер не найден';
            }

        } else {
            http_response_code(404);
            include '404.html';
        }
    }

    protected static function upperCamelCase($name)
    {
        return str_replace(' ', '', ucwords(str_replace('-', ' ', $name)));
    }

    protected static function lowerCamelCase($name)
    {
        return lcfirst(self::upperCamelCase($name));
    }

    protected static function removeQueryString($url) {
        if($url){
            $params = explode('&', $url, 2);
            if(false === strpos($params[0], '=')){

                return rtrim($params[0], '/');
            }else{
                return '';
            }
        }
    }
}