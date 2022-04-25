<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;


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
        // photo upload
        $fileName = time().$request->file('thumbnail')->getClientOriginalName();
        $path = $request->file('thumbnail')->storeAs('images', $fileName, 'public');
        $product->thumbnail = '/storage/'.$path;

        $product->save();
        return redirect()->back()->with('success','Successfully Product Added');



    }

    public function allProduct(){
        $result=Product::all();
        return view('admin.product.all_product',compact('result'));
    }
    public function deleteProduct($id){
        $singleProduct=Product::find($id);
       $file_path = 'public'.$singleProduct->thumbnail;

    //    dd( $file_path);
        Storage::delete($file_path);
        $singleProduct->delete();
        return redirect()->back()->with('success','Successfully Product Deleted');
    }
}
