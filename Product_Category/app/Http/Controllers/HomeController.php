<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\subcategory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    

    public function index()
    {
        $products = Product::paginate(20);
        
        $categories = Category::all(); 
        
        $subCategories = subcategory::all();

        return view('home.index' ,[
            'products' => $products,
            'categories' => $categories,
            'subCategories' => $subCategories
        ]);

    }
    public function show(Product $product)
    {
        return view('home.show' , [
            'product' => $product
        ]);
    }
}
