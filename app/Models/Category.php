<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function rSubCategory(){
        return $this->hasMany(SubCategory::class);
    }

    public function rProduct(){
        return $this->hasMany(Product::class,'category_id','id');
    }
}
