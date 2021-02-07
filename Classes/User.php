<?php
namespace App\Controller;
use App\Core\Db;

class User extends Db
{
    public function insert($login, $password)
    {
        $query = $this->db->prepare("INSERT INTO user(login, password) VALUES(:login, :password)");
        $query->execute([
            ':login' => $login,
            ':password' => $password
        ]);
    }

    public function verify_user_login($login)
    {
        $query = $this->db->prepare("SELECT * FROM user WHERE login = :login");
        $query->execute([':login' => $login]);
        $user_in_db = $query->fetch();
        return $user_in_db;
    }

    public function verify_user_password($login, $password)
    {
        $query = $this->db->prepare("SELECT * FROM user WHERE login = :login");
        $query->execute([':login' => $login]);
        $user_in_db = $query->fetch();
        if (password_verify($password, $user_in_db['password'])) {
            $_SESSION['id'] = $user_in_db['id'];
            return true;
        }else {
            return false;
        }
    }

    public function getScore()
    {

    }
}