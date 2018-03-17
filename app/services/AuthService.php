<?php
namespace app\services;

use app\models\Admin;

class AuthService
{
    private $adminModel;

    public function __construct()
    {
        $this->adminModel = new Admin();
    }

    /**
     * @param string $login
     * @param string $password
     * @return bool
     */
    public function auth(string $login, string $password) :bool
    {
        $user = $this->adminModel->getUser($login);

        if (base64_encode($password) === $user['password']) {
            return true;
        } else {
            return false;
        }
    }

    public function isAuth()
    {
        return $_SESSION['is_login'];
    }

    public function saveAuth()
    {
        $_SESSION['is_login'] = true;
    }
    
    public function logout()
    {
        $_SESSION['is_login'] = false;
    }

//    public function getUser()
//    {
//        $tocken = $_POST['_tocken'];
//        if (in_array($tocken, $_SESSION['tockens'])) {
//            return $_SESSION['tockens'][$tocken];
//        }
//        return false;
//    }


}