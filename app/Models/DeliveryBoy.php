<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class DeliveryBoy extends Authenticatable
{
    use HasFactory;
    protected $guarded = [];
}
