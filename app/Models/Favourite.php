<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favourite extends Model
{
    use HasFactory;

    protected $fillable = [
        'item'
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class,'product_favourite');
    }
    public function users()
    {
        return $this->belongsToMany(User::class,'user_favourite');
    }



}
