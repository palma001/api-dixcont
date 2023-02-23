<?php

namespace App\Services;

use App\Models\Taxe;

class TaxeService
{
    public function saveProducts(Taxe $taxe, $products)
    {
        collect($products)
            ->each(function ($product) use ($taxe) {
                $taxe->products()->attach(
                    $product['id'],
                    [
                        'amount' => $product['amount'],
                        'price' => $product['price'],
                        'taxe' => 0
                    ]
                );
            });
    }
}