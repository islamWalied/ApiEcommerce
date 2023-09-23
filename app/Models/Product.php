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
}
