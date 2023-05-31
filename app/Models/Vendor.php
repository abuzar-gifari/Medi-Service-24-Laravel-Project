<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Vendor extends Authenticatable
{
    use HasFactory;

    protected $guarded = [];

    public function rProduct()
    {
        return $this->hasMany(Product::class,'vendor_id','id');    
    }
}
