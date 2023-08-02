<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['name','email','phone','address','product_title','price','quantity','image','Product_id','user_id','payment_status','delivery_status'];
    use HasFactory;
}
