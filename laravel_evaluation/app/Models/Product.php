<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'thumbnail',
        'price',
        'category_id',
        'subcategory_id',
    ];

    private static $product;
    private static $image;
    private static $imageName;
    private static $imageUrl;
    private static $directory;


public function category()
{
    return $this->belongsTo(Category::class);
}

public function subCategories()
{
    return $this->belongsTo(Subcategory::class,'subcategory_id','id');
}

}
