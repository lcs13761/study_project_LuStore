<?php


namespace Source\App\Web;

use Source\Core\Pager;
use Source\Model\About;
use Source\Models\Product;
use Source\Core\Controller;


class HomeController extends Controller
{

    /**
     * SITE HOME
     */
    public function index()
    {
        $head = $this->seo->render(
            "Site Modelo  .Conheca a " . CONF_SITE_NAME,
            CONF_SITE_DESC,
            url(),
            ""
        );

        return $this->view->render("web/home", ["head" => $head]);
    }

    public function show() {}
}
