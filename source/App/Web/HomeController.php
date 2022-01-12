<?php


namespace Source\App\Web;

use Source\Models\Product;
use Source\Core\Controller;
use Source\Models\Category;
use Source\Support\Pager;

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

    public function show($category)
    {
        $head = $this->seo->render(
            "Site Modelo  .Conheca a " . CONF_SITE_NAME,
            CONF_SITE_DESC,
            url(),
            ""
        );


        $request = (object)input()->all();
        $page = $request->page ?? 1;
        $category = str_replace('-', ' ', $category);
        $idCategory = Category::where('name', $category)->fetch();


        $products = null;
        $paginator = null;

        if ($idCategory) {
            $products = Product::where('category_id', $idCategory->id);
            $pager = new Pager($products->count(), 10, $page);

            $products = $products->limit($pager->pager->limit())->offset($pager->pager->offset())->fetch(true);
            $paginator = $pager->paginator;
        }
        
        return $this->view->render('web/products', compact('products', 'head', 'paginator'));
    }

    public function search($search = "all")
    {
        $request = (object)input()->all();
        if (isset($request->s)) {
            $search = !empty($request->s) ? $request->s : "all";
            redirect(url('search.web', ['search' => $search]));
        }

        if ($search != "all") {
            $products = Product::where("name", "%$search%", 'LIKE');
        } else {
            $products = Product::all(false);
        }


        $page = $request->page ?? 1;
        $pager = new Pager($products->count(), 10, $page);
        $products = $products->limit($pager->pager->limit())->offset($pager->pager->offset())->fetch(true);
        $paginator = $pager->paginator;

        $head = $this->seo->render(
            "Site Modelo  .Conheca a " . CONF_SITE_NAME,
            CONF_SITE_DESC,
            url(),
            ""
        );
        return $this->view->render('web/products', compact('products', 'head', 'paginator'));
    }
}
