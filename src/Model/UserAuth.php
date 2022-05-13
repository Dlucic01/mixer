<?php

namespace App\Model;

use Core\Model;

class UserAuth extends Model
{
    private string $first_name;
    private string $last_name;
    private string $username;
    private string $email;
    private string $password;
    private string $status;
    private string $registration_date;
    private string $verification_code;

    //Setter methods for user credentials

    public function setFirstName(string $first_name)
    {
        $this->first_name = $first_name;
    }

    public function setLastName(string $last_name)
    {
        $this->last_name = $last_name;
    }

    public function setUsername(string $username)
    {
        $this->username = $username;
    }

    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    public function setPassword(string $password)
    {

        $this->password = $password;
    }

    //Status is either 'Disabled' or 'Enabled' in DB, when 'Enabled' user can login.
    public function setStatus(string $status)
    {
        $this->status = $status;
    }

    public function setRegistrationDate(string $registration_date)
    {
        $this->registration_date = $registration_date;
    }

    //Verification code of an email sent to the user making user worthy of loging in.
    public function setVerificationCode(string $verification_code)
    {
        $this->verification_code = $verification_code;
    }

    //Getter functions
    public function getFirstName(): string
    {
        return $this->first_name;
    }
    public function getLastName(): string
    {
        return $this->last_name;
    }
    public function getUsername(): string
    {
        return $this->username;
    }
    public function getEmail(): string
    {
        return $this->email;
    }
    public function getPassword(): string
    {
        return $this->password;
    }
    public function getStatus(): string
    {
        return $this->status;
    }
    public function getRegistrationDate(): string
    {
        return $this->registration_date;
    }
    public function getVerificationCode(): string
    {
        return $this->verification_code;
    }

    //Creates an user and sets users credentials into the DB.
    public function createUser(array $data): bool
    {
        $sql = "INSERT INTO users (first_name, last_name, username, email, password, status, registration_date, verification_code) VALUES (:first_name, :last_name, :username, :email, :password, :status, :registration_date, :verification_code)";
        $db = $this->db;

        $password = $data['password'];
        $hash = password_hash($password, PASSWORD_BCRYPT);
        $data['password'] = $hash;

        $db->query($sql);
        $db->bind(':first_name', $data['first_name']);
        $db->bind(':last_name', $data['last_name']);
        $db->bind(':username', $data['username']);
        $db->bind(':email', $data['email']);
        $db->bind('password', $data['password']);
        $db->bind(':status', $data['status']);
        $db->bind(':registration_date', $data['registration_date']);
        $db->bind(':verification_code', $data['verification_code']);

        if ($db->execute()) {
            return true;
        }

        $db = null;
        return false;
    }

    public function getUserData(string $username): array
    {
        $sql = "SELECT first_name, last_name, username, email, status, registration_date FROM users WHERE username = :username";
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

    //Check if token sent via email is the same as the user's in the DB
    public function isValidEmailToken(string $token): bool
    {
        $sql = "SELECT * FROM users WHERE verification_code = :verification_code";
        $db = $this->db;
        $db->query($sql);
        $db->bind(':verification_code', $token);
        $db->execute();

        if ($db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    //Update users status from 'Disabled' into 'Enabled' when verification code matches the one sent via email
    public function enableAccount(string $verification_code): bool
    {
        $sql = "UPDATE users SET status = :status WHERE verification_code = :verification_code";
        $db = $this->db;

        $db->query($sql);

        $db->bind(':status', "Enabled");
        $db->bind(':verification_code', $verification_code);

        if ($db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteUser(string $username): bool
    {
        $sql = "DELETE FROM users WHERE username = :username";

        $db = $this->db;
        $db->query($sql);

        $db->bind(':username', $username);

        if ($db->execute()) {
            return true;
        }

        $db = null;
        return false;
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
}
