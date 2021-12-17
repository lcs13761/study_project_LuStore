<?php

namespace Source\Models;

use Source\Core\Database\Model;
use Source\Core\Session;

class Auth extends Model
{

    protected $table = "users";


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
    public function attempt(array $credentials, bool $save = false)
    {
        $credentials = (object)$credentials;
        $user = $this->auth($credentials->email);
        if (!$user) {
            session()->set("message","O usuario informado não está cadastrado");
            return null;
        }

        if (!password_verify($credentials->password, $user->password)) {
            session()->set("message","A senha informada não confere");
            return null;
        }

        if ($save) {
            setcookie("authUser", $user->email, time() + 604800, "/");
        } else {
            setcookie("authUser", null, time() - 3600, "/");
        }

        //LOGIN
        (new Session())->set("authUser", $user->id);
        return true;
    }

}
