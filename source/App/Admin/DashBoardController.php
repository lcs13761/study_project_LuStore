<?php


namespace Source\App\Admin;

use Source\Model\Auth;
use Source\Core\Controller;


class DashboardController extends Controller
{
  public function index(){
    $head = $this->seo->render(
      "Site Modelo  .Conheca a " . CONF_SITE_NAME,
      CONF_SITE_DESC,
      url(),
      ""
  );

  echo $this->view->render("admin/dashboard", [
      // "product" => $product,
      //"head" => $head,
      // "paginator" => $pager->render(),
      // "banner" => $banner
  ]);
  }

}
