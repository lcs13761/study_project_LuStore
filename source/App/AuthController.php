<?php


namespace Source\App;

use Pecee\Http\Input;
use Pecee\Http\Request;
use Source\Core\Controller;
use Source\Models\Auth;
use Source\Support\Validate;
use Webmozart\Assert\Assert;

class AuthController extends Controller
{

    public function index()
    {
        if(auth()){
            redirect("/");
        }

        $head = $this->seo->render(
            CONF_SITE_NAME . " | singIn",
            CONF_SITE_DESC,
            url("/singIn"),
            CONF_VIEW_ADMIN,
            false
        );

        echo $this->view->render("web/auth-login", [
            "head" => $head,
            "cookie" => filter_input(INPUT_COOKIE, "authUser")
        ]);
    }

    public function login()
    {
        if(auth()){
            redirect("/");
        }

        if (!input()->value("_token") || !csrf_verify(input()->value("_token")))  return  redirect(abort("error"));
        $validated = (new Validate())->make(input()->all(), [
            "email" => ["email"],
            "password" => ["string"],
        ]);

        if ($validated->fails()) {
            return  redirect(url_back());
        }

        $auth = (new Auth())->attempt(input()->all());
        if (!$auth) {
            redirect("/login");
        }

        redirect("/");
    }

    public function logout()
    {
        Auth::logout();
        redirect("/login");
    }
}
