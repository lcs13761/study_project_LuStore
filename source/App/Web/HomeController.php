<?php


namespace Source\App\Web;

use Source\Core\Pager;
use Source\Model\About;
use Source\Models\Product;
use Source\Core\Controller;
use Source\Models\User;
use Tests\Support\Migration\src\TypeColumn;

use Migrations;
use Source\Models\Category;

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

        $categories = Category::all();
        return $this->view->render("web/home", compact('head', 'categories'));
    }

    public function show($id)
    {
        $head = $this->seo->render(
            "Site Modelo  .Conheca a " . CONF_SITE_NAME,
            CONF_SITE_DESC,
            url(),
            ""
        );


        $products = Product::where('category_id', $id)->fetch(true);
        return $this->view->render('web/products',compact('products','head'));
    }

    public function search(){
        $head = $this->seo->render(
            "Site Modelo  .Conheca a " . CONF_SITE_NAME,
            CONF_SITE_DESC,
            url(),
            ""
        );
        $request = (object)input()->all();
        $products = Product::where("name","%$request->s%",'LIKE')->fetch(true);
        return $this->view->render('web/products',compact('products','head'));
    }
}
