<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index',['categories'=>$categories]);
    }
    public function create()
    {
        return view('admin.category.create');
    }


    public function store(Request $request)
    {
        $category = new Category();
        $category->title = $request->title;
        $category->save();
        return redirect('/admin/categories');

    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.category.edit',['category'=>$category]);

    }

    public function update(Request $request,$id)
    {
        $category = Category::find($id);
        $category->title = $request->title;
        $category->save();
        return redirect('/admin/categories');

    }

    public function delete($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->back();
    }

}
