<?php

namespace Source\App\Auth;

use Source\Core\Controller;
use Source\Models\User;

class VerifyEmailController extends Controller
{

      public function index()
      {
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

      public function verifiy($id, $token)
      {
            $user = (new User())->find($id);

            if (!$user || $user->email_verified !== $token) {
                  session()->set("message", "Error ao verficar o e-mail, faça login para pode solicitar outra verificacão.");
                  redirect("/login");
            }

            $user->hasVerifiedEmail();

            echo $this->view->render("web/optin", [
                  "head" => "",
                  "data" => (object)[
                        "title" => "Muito Obrigado!",
                        "desc" => "Seu e-mail foi confirmado com sucesso.",
                        "image" =>  theme("/assets/images/optin-success.svg"),
                        "link" => url("/login"),
                        "linkTitle" => "Fazer Login",
                  ],
            ]);
      }
}
