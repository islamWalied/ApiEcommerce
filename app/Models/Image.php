<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $fillable = [
        'image_url',
        'product_id',
//        'caption',
//        'alt_text',
        'is_primary',
//        'file_size',
//        'file_type',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
