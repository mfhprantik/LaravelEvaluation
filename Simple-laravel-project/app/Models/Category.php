<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function sub_categories() {
        return $this->hasmany(Sub_Category::class);
      }
      
      public function product() {
        return $this->belongsTo(Product::class);
      }
}
