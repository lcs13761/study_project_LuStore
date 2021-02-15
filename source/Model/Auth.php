<?php

namespace Source\Model;

use Source\Core\Model;
use Source\Core\Session;



class Auth extends Model
{
    public function __construct()
    {
        parent::__construct("administrador", "id");
    }

    /**
     * @return null|User
     */
    public static function user()
    {
        $session = new Session();
        if (!$session->has("authUser")) {
            return null;
        }
        
        return $session->has("authUser");
    }


    /**
     * log-out
     */
    public static function logout()
    {
        $session = new Session();
        $session->unset("authUser");
    }


    /**
     * @param string $usuario
     * @param string $password
     * @param int $level
     * @return User|null
     */
    public function attempt(string $usuario, string $password)
    {
        $user = $this->findByUsuario($usuario);

        if (!$user) {
            //echo ("O usuario informado não está cadastrado");
            return null;
        }

        if (!password_verify($password, $user->senha)) {
            //echo ("A senha informada não confere");
            return null;
        }



        return $user;
    }

    /**
     * @param string $usuario
     * @param string $password
     * @param bool $save
     * @param int $level
     * @return bool
     */
    public function login(string $usuario, string $password, bool $save = false): bool
    {
        $usuario = filter_var($usuario, FILTER_SANITIZE_SPECIAL_CHARS);
        $user = $this->attempt($usuario, $password);
        if (!$user) {
            return false;
        }

        if ($save) {
            setcookie("authUser", $usuario, time() + 604800, "/");
        } else {
            setcookie("authUser", null, time() - 3600, "/");
        }

        //LOGIN

        (new Session())->set("authUser", $user->id);
        return true;
    }


    public function findByUsuario(string $usuario, string $columns = "*")
    {
        $find = $this->find(" WHERE usuario = ", "'{$usuario}'");
        return $find->fetch();
    }
}
