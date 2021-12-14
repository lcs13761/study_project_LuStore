<?php

namespace Source\App\Admin;

use Source\Core\Controller;
use Pecee\Controllers\IResourceController;
use Source\Models\Product;
use Source\Request\ProductRequest;

class ProductController extends Controller implements IResourceController
{


    public function index()
    {
        $product = new Product();
        $products = $product->all();
        return $this->view->render("admin/product/index", compact('products'));
    }


    public function create()
    {

        return $this->view->render("admin/product/form", []);
    }

    public function store()
    {
        $request = new ProductRequest();
        if(!$request->validation()) redirect(url_back());
       $verify =  (new Product())->create($request->all());
        if(!$verify) return 'aa';
        redirect('/admin/product');
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
    }

    public function update($id)
    {
    }

    public function destroy($id)
    {
    }

}