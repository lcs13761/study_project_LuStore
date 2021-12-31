<?php

namespace Source\App\Web;

use Source\Core\Controller;
use Source\Models\User;
use Source\Request\Admin\UserRequest;
use Source\Support\Event;

class UserController extends Controller
{
    public function create():void
    {
        $head = $this->seo->render(
            CONF_SITE_NAME . " | create",
            CONF_SITE_DESC,
            url("/singIn"),
            CONF_VIEW_ADMIN,
            false
        );

        echo $this->view->render("web/auth-register", [
            "head" => $head,
            "cookie" => filter_input(INPUT_COOKIE, "authUser")
        ]);

    }

    /**
     * @var UserRequest $request
     */

    public function store(): void
    {
        $request = new UserRequest();
        if (!$request->validation()) redirect(abort("error"));
        $create = [
            "name" => $request->name,
            "email" => $request->email,
            "password" => passwd($request->password),
            "email_verified" => tokenEmailVerification($request->email)
        ];

        $user = User::create($create);
        (new Event())->registered($user);
        redirect('/confirmar');
    }

    public function show()
    {
    }

    public function update()
    {
    }

    public function delete()
    {
    }
}
