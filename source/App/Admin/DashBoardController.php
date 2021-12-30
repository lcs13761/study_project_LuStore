<?php


namespace Source\App\Admin;

use Source\Model\Auth;
use Source\Core\Controller;


class DashBoardController extends Controller
{
    public function index(): string
    {
         return $this->view->render("admin/dashboard");
    }

}
