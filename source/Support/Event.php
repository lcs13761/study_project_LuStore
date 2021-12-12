<?php


namespace Source\Support;

use Source\Core\View;
use Source\Models\User;

class Event
{


  private $email;

  public function __construct()
  {
    $this->view = new View(__DIR__ . "/../../shared/views/email");
    $this->email = new Email();
  }

  public function registered(User $user)
  {
    $message = $this->view->render("confirm", [
      "name" => ucfirst($user->name),
      "button" => "CONFIRMAR E-MAIL",
      "confirm_link" => CONF_URL_BASE . "/email/verify/". $user->id. "/" . $user->email_verified
    ]);

    $status = $this->email->bootstrap(
      "Ative sua conta no " . CONF_SITE_NAME,
      $message,
      $user->email,
      $user->name
    )->send();

    return true;
  }


}
