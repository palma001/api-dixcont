<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductService
{
    public function saveImages(Product $product, $images)
    {
        collect($images)
            ->each(function ($image) use ($product) {
                if ($image != 'undefined') {
                    $path = Storage::putFile("products/{$product->name}", $image);
                    $product->images()->create(['url' => $path]);
                }
            });
    }
}
