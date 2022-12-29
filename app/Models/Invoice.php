<?php

namespace App\Models;

use Carbon\Carbon;

class Invoice extends Base
{
    protected $appends = ['tax_base', 'total_taxe', 'total', 'date', 'hour', 'total_payments', 'code'];

    protected $with = [
        'client:id,name',
        'seller:id,name',
        'products',
        'coin:id,name,symbol',
        'invoiceType:id,name,acronym_serie',
        'invoicePayments.paymentMethod:id,name',
        'tables:id,name'
    ];

    public function getTaxBaseAttribute()
    {
        return $this->products->sum(function ($product) {
            return $product->pivot->price * $product->pivot->amount;
        });
    }

    public function getCodeAttribute()
    {
        $code = str_pad($this->id, 6, "0", STR_PAD_LEFT);
        return "{$this->invoiceType->acronym_serie}{$code}";
    }

    public function getTotalPaymentsAttribute()
    {
        return $this->invoicePayments->sum('amount');
    }
    /**
     * Get invoice taxe
     * @return float
     */
    public function getTotalTaxeAttribute()
    {
        return round(($this->taxe * $this->tax_base) / 100, 2);
    }
    /**
     * Get invoice taxe
     * @return float
     */
    public function getDateAttribute()
    {
        return Carbon::parse($this->created_at)->format('Y-m-d');
    }
    /**
     * Get invoice taxe
     * @return float
     */
    public function getHourAttribute()
    {
        return Carbon::parse($this->created_at)->format('H:m:s');
    }
    /**
     * Get invoice total
     * @return float
     */
    public function getTotalAttribute()
    {
        return $this->tax_base + $this->total_taxe;
    }
    /**
     * The products that belong to the Invoice
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function products()
    {
        return $this->belongsToMany(Product::class)
            ->withPivot('amount', 'price', 'taxe');
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
    /**
     * The invoiceTaxes that belong to the Invoice
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function taxes()
    {
        return $this->belongsToMany(Taxe::class)
            ->withPivot('type_taxe', 'amount');
    }
}
