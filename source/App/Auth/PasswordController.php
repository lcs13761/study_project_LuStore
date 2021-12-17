<?php

namespace Source\App\Auth;

use Source\Core\Controller;

class PasswordController extends Controller
{

    public function index(){
        $head = $this->seo->render(
            "Site Modelo  .Conheca a " . CONF_SITE_NAME,
            CONF_SITE_DESC,
            url(),
            ""
        );
        return $this->view->render('web/forgot-password',compact('head'));
    }


}