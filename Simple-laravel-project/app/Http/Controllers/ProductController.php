<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;


class ProductController extends Controller
{
    public function index(){
        return view('admin.product.index');
    }

    public function addProduct(Request $request){
        $product = new Product();
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->subcategory_id = $request->subcategory_id;
        $product->save();
        return redirect()->back();
    }

    public function allProduct(){
        $result=Product::all();
        return view('admin.product.all_product',compact('result'));
    }
    public function deleteProduct($id){
        $singleProduct=Product::find($id);
        $singleProduct->delete();
        return redirect()->back();
    }
}
