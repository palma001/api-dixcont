<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    /**
     * The invoices that belong to the Table
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function invoices()
    {
        return $this->belongsToMany(Invoice::class);
    }
}
