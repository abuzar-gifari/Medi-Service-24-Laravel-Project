<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function rProductPhoto()
    {
        return $this->hasMany(ProductPhoto::class,'product_id','id');    
    }

    public function rCategory()
    {
        return $this->belongsTo(Category::class,'category_id','id');    
    }

    public function rVendor()
    {
        return $this->belongsTo(Vendor::class,'vendor_id','id');    
    }
}
