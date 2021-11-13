<?php

namespace Source\App\Auth;

use Source\Core\Controller;

class VerifyEmailController extends Controller{

public function index()  {
      $head = $this->seo->render(
                  CONF_SITE_NAME . " | verify",
                  CONF_SITE_DESC,
                  url("/singIn"),
                  CONF_VIEW_ADMIN,
                  false
      );
      
      echo $this->view->render("web/optin", [
            "head" => $head,
            "data" => (object)[
            "title" => "Falta pouco! Confirme seu cadastro.",
                        "desc" => "Enviamos um link de confirmação para seu e-mail. Acesse e siga as instruções para concluir seu cadastro.",
                        "image" => theme("/assets/images/optin-confirm.jpg")
                  ]
            ]);
      }
}
