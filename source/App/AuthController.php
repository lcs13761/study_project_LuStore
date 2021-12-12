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
use Source\Support\Oauth2\GoogleAuth;
use Source\Support\Validate;
use Webmozart\Assert\Assert;

class AuthController extends Controller
{

    public function index()
    {
        if (auth()) {
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
        if (auth()) {
            redirect("/");
        }


        $auth = (new Auth())->attempt([
            'name' => input()->value('name'),
            'email' => input()->value('email'),
            'password' => input()->value('password')
        ]);
        if (!$auth) {
            redirect("/login");
        }
        redirect("/");
    }

    /**
     * @param $auth
     * @var  GoogleUser $auth
     */
    public function loginAuth($auth)
    {
        $user = (new User());

        if ($auth == 'google') {
            $auth = new GoogleAuth();
            if (empty($auth->code))redirect($auth->authorization());
            if (!empty($auth->error)) echo 'aa';

            $auth = $auth->user();
            $verify_email = $user->where('email',$auth->getEmail())->count();
            if (!$user->find($auth->getId()) && !$verify_email > 0) {
                $result = $user->create([
                    'auth_id' => $auth->getId(),
                    "name" => $auth->getName(),
                    "email" =>  $auth->getEmail(),
                    'password' => passwd($auth->getId()),
                    'photo' => $auth->getAvatar(),
                    "email_verification_at" => $user->timeNow()
                ]);
            }
            if($verify_email > 0) redirect('login');
            (new Session())->set("authUser",  $auth->getId());
            redirect('/');
        }
    }

    public function logout()
    {
        Auth::logout();
        redirect("/login");
    }
}
