<?php

namespace Source\App\Admin;

use Pecee\Controllers\IResourceController;
use Source\Core\Controller;
use Source\Models\Category;
use Source\Request\CategoryRequest;

class CategoryController extends Controller implements IResourceController
{

    public function index(): string
    {
        $categories = Category::all();
        return $this->view->render('admin/category/index', compact('categories'));
    }

    public function show($id)
    {
        // TODO: Implement show() method.
    }


    public function create(): string
    {
        return $this->view->render('admin/category/form');
    }

    public function store()
    {
        $request = new CategoryRequest();
        if (!$request->validation()) redirect(url_back());
        Category::create($request->all());
        redirect(url('admin/category'));
    }

    public function edit($id): string
    {
        $category = Category::find($id);
        return $this->view->render('admin/category/form',compact('category'));
    }

    public function update($id)
    {
        $category = Category::find($id);
        $request = new CategoryRequest();
        if (!$request->validation()) redirect(url_back());
        $category->update($request->all());
        redirect(url('admin/category'));
    }


    /**
     * @param $id
     * @var Category $category;
     */
    public function destroy($id)
    {
        if(!Category::find($id)->destroy())  return response()->json(["status" => "error"],500);
        return response()->json(["status" => 'success']);
    }
}