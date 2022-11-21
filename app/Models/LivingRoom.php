<?php

namespace App\Models;

class LivingRoom extends Base
{
    /**
     * Get all of the tables for the LivingRoom
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tables()
    {
        return $this->hasMany(Table::class);
    }
}

