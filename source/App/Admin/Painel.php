<?php


namespace Source\App\Admin;

use Source\Model\Auth;


class Painel extends Admin
{

    public function __construct()
    {
        parent::__construct();
    }

    public function logoff(): void
    {
        Auth::logout();
        redirect("/admin/login");
    }

    public function painel(): void
    {
        redirect("/admin/painel/home");
    }
}
