<?php

namespace App\Http\Resources;

use App\Models\Color;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price,
            'discount_price' => $this->discount_price,
            'quantity' => $this->quantity,
            'category_id' => $this->category_id,
            'sizes' => $this->sizes->pluck('size'),
            'colors' => $this->colors->pluck('color'),
            'images' => $this->images->pluck('image_url'),
            'reviews' => ReviewResource::collection($this->reviews),
        ];
    }
}
