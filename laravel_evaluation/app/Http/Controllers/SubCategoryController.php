<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $subcategories = Subcategory::all();
        return view('admin.subcategory.index',['subcategories'=>$subcategories]);
    }

    public function edit($id)
    {
        $categories = Category::all();
        $subcategory = Subcategory::find($id);

        return view('admin.subcategory.edit',['subcategory'=>$subcategory,'categories'=>$categories]);

    }
    public function create()
    {
        $categories = Category::all();

        return view('admin.subcategory.create',['categories'=>$categories]);
    }



    public function store(Request $request)
    {
        $subcategory = new Subcategory();
        $subcategory->title = $request->title;
        $subcategory->category_id = $request->category_id;
        $subcategory->save();
        return redirect()->back();
    }

    public function update(Request $request,$id)
    {
        $subcategory = Subcategory::find($id);
        $subcategory->title = $request->title;
        $subcategory->category_id = $request->category_id;
        $subcategory->save();

        return redirect('/admin/subcategories');
    }

    public function delete($id)
    {
        $category = Subcategory::find($id);
        $category->delete();
        return redirect()->back();
    }



}
