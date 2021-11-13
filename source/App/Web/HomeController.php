<?php


namespace Source\App\Web;

use Source\Core\Pager;
use Source\Model\About;
use Source\Model\Product;
use Source\Core\Controller;
use Source\Model\Banners;


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
       
        echo $this->view->render("web/home", [
            // "product" => $product,
            "head" => $head,
            // "paginator" => $pager->render(),
            // "banner" => $banner
        ]);
    }
}
