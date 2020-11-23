<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable=['name','price'];


    public function users()
    {
        return $this->belongsToMany(Product::class,'carts','product_id','user_id')->with('amount');
    }
}
