<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Models\Product;


class fronendController extends Controller
{
    public function index()
    {
        $data = [
            'products' => Product::all(),
            'categories' => Category::all(),
            'subCategories' => Subcategory::all(),
        ];
        return view('frontend.home', $data);
    }

    public function searchProduct(Request $request)
    {
        $data = [
            'products' => Product::all(),
            'categories' => Category::all(),
            'subCategories' => Subcategory::all(),
            'productsFilter'=>collect(),
        ];
        if ($request->filled('title') or $request->filled('category') or $request->filled('sub_category') or $request->filled('price')) {
            $data['productsFilter']= $this->getProductSearchResult($request);
        }
        return view('frontend.home', $data);
    }


    public function getProductSearchResult($request)
    {
        $query = Product::with(['subCategories', 'category'])->get();
        if (isset($request->title)) {
            $query = Product::where('title', 'LIKE', '%' . $request->title . '%')->get();
        }
        if (isset($request->category)) {
            $query = Product::where('category_id', $request->category)->get();
        }
        if (isset($request->sub_category)) {
            $query = Product::where('subcategory_id', $request->sub_category)->get();
        }

        if (isset($request->price)) {
            if ($request->price == 100) {
                $query= Product::where('price', '>=', 0)->where('price', '<=', 100)->get();

            }
            if ($request->price == 300) {
                $query= Product::where('price', '>=', 100)->where('price', '<=', 300)->get();

            }
            if ($request->price == 500) {
                $query= Product::where('price', '>=', 300)->where('price', '<=', 500)->get();

            }
            if ($request->price ==  1000) {
                $query= Product::where('price', '>=', 500)->where('price', '<=', 1000)->get();
            }
        }
        return $query;
    }

}
