<?php

namespace Source\App\Web;

use Source\Core\Connect;
use Source\Core\Controller;
use Source\Models\User;
use Source\Support\Event;
use Source\Support\Validate;

class UserController extends Controller
{


  public function index()
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

  public function store(){

    if (!input()->value("_token") || !csrf_verify(input()->value("_token")))  return  redirect(abort("error"));
    $validated = (new Validate())->make(input()->all(), [
      "name" => ["string"],
      "email" => ["email", "unique:email,user"],
      "password" => ["string"],
    ]);

    if ($validated->fails()) {
      return redirect(url_back());
    }
    
    $create = [
      "name" => input()->value("name"),
      "email" => input()->value("email"),
      "password" => password_hash(input()->value("password"), PASSWORD_DEFAULT),
      "email_verified" => hash("sha256", base64_encode(input()->value("email")))
    ];

    $user = (new User())->create($create);
    (new Event())->registered($user);
    redirect('/confirma');
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
