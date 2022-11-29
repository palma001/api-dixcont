<?php

namespace App\Models;

class Invoice extends Base
{
    public function getTaxBaseAttributes()
    {
        return $this->products->sum(function ($product) {
            return $product->pivot->price * $product->pivot->amount;
        });
    }
    /**
     * The products that belong to the Invoice
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function products()
    {
        return $this->belongsToMany(Product::class)
            ->using(InvoiceProduct::class)
            ->wherePivot('amount', 'price', 'igv');
    }
    /**
     * Get the coin that owns the Invoice
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function coin()
    {
        return $this->belongsTo(Coin::class);
    }
    /**
     * Get the invoiceType that owns the Invoice
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function invoiceType()
    {
        return $this->belongsTo(InvoiceType::class);
    }
    /**
     * Get all of the invoicePayments for the Invoice
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function invoicePayments()
    {
        return $this->hasMany(InvoicePayment::class);
    }
    /**
     * The invoiceTables that belong to the Invoice
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tables()
    {
        return $this->belongsToMany(Table::class);
    }
    /**
     * Get the seller that owns the Invoice
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }
    /**
     * Get the client that owns the Invoice
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
