<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\subcategory;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function searchProductByCategory(subcategory $category)
    {
        $products = $category->products()->paginate(10);
        $subCategories = subcategory::all();

        return view('search.category' , [
            'products' => $products,
            'subCategories' => $subCategories
        ]);
    }
}
