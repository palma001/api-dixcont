<?php

namespace App\Services;

use App\Models\Product;

class ProductService
{
    public function saveImages(Product $product, $images)
    {
        $product->images()->createMany($images);
    }
}
