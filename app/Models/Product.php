<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'price',
        'discount_price',
        'quantity',
        'category_id',
    ];

    public function images()
    {
        return $this->hasMany(Image::class);
    }
    public function colors()
    {
        return $this->belongsToMany(Color::class,'product_color');
    }
    public function sizes()
    {
        return $this->belongsToMany(Size::class,'product_size');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function cart()
    {
        return $this->belongsToMany(Cart::class,'product_cart');
    }

}
