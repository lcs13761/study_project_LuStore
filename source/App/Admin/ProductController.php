<?php

namespace Source\App\Admin;

use Source\Core\Controller;
use Pecee\Controllers\IResourceController;
use Source\Models\Category;
use Source\Models\Product;
use Source\Request\ProductRequest;

class ProductController extends Controller implements IResourceController
{


    public function index()
    {

        $products = Product::all();
        return $this->view->render("admin/product/index", compact('products'));
    }


    public function create()
    {
        $categories = Category::all();
        return $this->view->render("admin/product/form", compact('categories'));
    }

    public function store()
    {

        $request = new ProductRequest();
        if(!$request->validation()) redirect(url_back());
        if(isset($request->image)){
            $verify = $this->file->save($request->image);
            $request->image = $verify;
        }
        Product::create($request->all());
        redirect(url('product.index'));
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        return $this->view->render("admin/product/form", compact('product','categories'));
    }


    public function update($id)
    {
        $request = new ProductRequest();
        if(!$request->validation()) redirect(url_back());
        $product = Product::find($id);
        if(isset($request->image)){
            $this->file->destroy($product->image);
            $verify = $this->file->save($request->image);
            $request->image = $verify;
        }
        $product->update($request->all());
        redirect(url('product.index'));
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        if($product->image) $this->file->destroy($product->image);
        if(!$product->destroy())  return response()->json(["status" => "error"],500);
        return response()->json(["status" => 'success']);
    }

}