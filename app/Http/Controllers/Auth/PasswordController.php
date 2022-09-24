<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

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