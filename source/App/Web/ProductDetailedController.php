<?php


namespace Source\App\Web;
use Source\Core\Controller;

class ProductDetailedController extends Controller
{

    public function index(int $id){
      $head = $this->seo->render(
        "Site Modelo  .Conheca a " . CONF_SITE_NAME,
        CONF_SITE_DESC,
        url(),
        ""
    );

    return $this->view->render('web/details-product',compact('head'));
    }

}