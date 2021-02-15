<?php

namespace Source\App\Admin;

use Source\Core\Controller;
use Source\Model\Auth;
/**
 * Class Login
 * @package Source\App\Admin
 */
class Login extends Controller
{
    /**
     * Login constructor.
     * que extends controller
     */
    public function __construct()
    {
        parent::__construct(__DIR__ . "/../../../themes/" . CONF_VIEW_ADMIN . "/");
    }

    public function root(): void
    {
       
        $user = Auth::user();

        if ($user) {
            redirect("/admin/painel");
        } else {
            redirect("/admin/login");
        }
    }

    /**
     * @param array|null $data
     */
    public function login(?array $data): void
    {
       
        $user = Auth::user();
        
        if ($user) {
            redirect("/admin/painel");
        }

        if (!empty($data["usuario"]) && !empty($data["password"])) {
            $auth = new Auth();
            $login = $auth->login($data["usuario"], $data["password"], true);

            if ($login) {
               
               redirect("/admin/painel");
                
            }
        }

        $head = $this->seo->render(
            CONF_SITE_NAME . " | Admin",
            CONF_SITE_DESC,
            url("/admin"),
            CONF_VIEW_ADMIN,
            false
        );

        echo $this->view->render("login/login", [
            "head" => $head,
            "cookie" => filter_input(INPUT_COOKIE, "authUser")
        ]);
    }

   
}
