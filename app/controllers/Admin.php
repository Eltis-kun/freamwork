<?php

namespace app\controllers;


use app\services\AuthService;
use vendor\core\base\Controller;

class Admin extends Controller
{
    private $authService;

    public function __construct($route)
    {
        parent::__construct($route);
        $this->authService = new AuthService();
    }


    public function indexAction()
    {
        $this->view->generate([]);
    }

    public function logoutAction()
    {
        $this->authService->logout();
        header("Location: /admin");
    }

    public function loginAction()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $this->view->generate([], 'login.php');
        } else {
            if (isset($_POST['login']) && isset($_POST['password'])) {
                $login = $_POST['login'];
                $password = $_POST['password'];
                $user_id = $_POST['id'];
                $auth = new AuthService();
                if ($auth->auth($login, $password)) {

                    $this->authService->saveAuth();
//                    $_SESSION['tockens'][random_bytes(12)] = $user_id;
                    header("Location: /admin");
                    return;
                }
            }
            $this->view->generate(['errMsg' => 'Not valid data'], 'login.php');
        }

    }
}