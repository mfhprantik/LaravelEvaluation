<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subcategory extends Model
{
    use HasFactory;
    protected $guarded = [];
    
    public function Products()
    {
        return $this->hasMany('App\Models\Product');
    }
    public function categories() 
    {
        return $this->belongsTo('App\Models\Category');
    }
}
