<?php

namespace App\Models;


class Table extends Base
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
