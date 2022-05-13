<?php

namespace App\Controller;

error_reporting(E_ALL);

use Core\Controller;
use App\Model\UserAuth;

class UserAuthController extends Controller
{
    public static function register()
    {
        $data = $_POST;

        $user_data = new UserAuth;

        try {
            $user_data->createUser($data);
            echo "Good";
        } catch (\PDOException $e) {
            $e->getMessage();
        }
    }


    public function insert(array $params)
    {
        $user_data = new UserAuth;

        try {
            $user_data->createUser($params);
            echo "Registered!";
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function not()
    {
        echo "<p>Custom Error</p>";
    }

    public function enter_login(array $data)
    {

        $data_user = $data['username'];
        $check_password = new UserAuth;
        if (isset($data_user)) {
            if ($check_password->checkPassword($data_user)) {
                return $this->setSessionUsername($data_user);
            }
        }
    }

    public function setSessionUsername(string $data_user)
    {
        $_SESSION["username"] = $data_user;
        header('Location: /');
    }

    public function removeSessionUsername()
    {
        if (isset($_SESSION['username'])) {
            unset($_SESSION['username']);
            session_destroy();
            header('Location: /login');
            exit();
        }
    }
}
