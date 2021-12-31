<?php


namespace Source\App;

use League\OAuth2\Client\Provider\Google;
use League\OAuth2\Client\Provider\GoogleUser;
use Pecee\Http\Input;
use Pecee\Http\Request;
use Source\Core\Controller;
use Source\Core\Session;
use Source\Models\Auth;
use Source\Models\User;
use Source\Request\AuthRequest;
use Source\Support\Oauth2\GoogleAuth;
use Source\Support\Validate;
use Webmozart\Assert\Assert;

class AuthController extends Controller
{

    public function index():void
    {
        if (Auth::auth()) redirect("/");

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

   final public function login(): void
    {
        if (Auth::auth()) redirect("/");

        $request = new AuthRequest();

        $auth = Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ]);
        if (!$auth) redirect("/login");
        redirect("/");
    }

    /**
     * @param $auth
     * @var  GoogleUser $auth
     */
    public function loginAuth($auth):void
    {

        if ($auth == 'google') {
            $auth = new GoogleAuth();
            if (empty($auth->code))redirect($auth->authorization());
            $auth = $auth->user();
            $routeRedirect = (new User())->oAuthGoogle($auth);
            redirect($routeRedirect);
            return;
        }

        if($auth == "facebook"){
        return;
        }

        redirect('login');
    }

    public function logout():void
    {
        Auth::logout();
        redirect("/login");
    }
}
