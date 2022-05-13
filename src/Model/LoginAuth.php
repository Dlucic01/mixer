<?php

namespace App\Model;

use Core\Model;

class LoginAuth extends Model
{
    private string $username;
    private string $password;


    public function setUsername(string $username)
    {
        $this->username = $username;
    }

    public function setPassword(string $password)
    {

        $this->password = $password;
    }



    public function getUsername(): string
    {
        return $this->username;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function checkPassword(string $username): array
    {
        $sql = "SELECT username, email, password FROM users WHERE username = :username";

        $db = $this->db;

        $db->query($sql);
        $db->bind(':username', $username);

        if ($db->execute()) {
            $data = $db->fetchAll();
            return $data;
        }

        echo "Nothing found in SQL query";

        $db = null;
    }

    public function setCookieUsername(string $data_user)
    {

        setcookie('login', $data_user);
        echo "Logged in as: " . $_COOKIE["login"];
    }
}
