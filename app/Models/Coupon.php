<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    const PERCENTAGE = 1;
    const AMOUNT = 2;
    const MINIMUM = 3;
    const FREE_SHIPPING = 4;


    //Relation one to many whit orders
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}