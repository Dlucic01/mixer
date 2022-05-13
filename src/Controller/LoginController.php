<?php

namespace App\Controller;

use Core\Controller;
use App\Model\LoginAuth;

class LoginController extends Controller
{

    public function enter_login(array $data)
    {

        $data_user = $data['username'];

        $new_user_login = new LoginAuth;

        if (isset($new_user_login)) {
            if ($new_user_login->checkPassword($data_user)) {
                $new_user_login->setCookieUsername($data_user);
            }
        }
    }
}
