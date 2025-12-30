<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Province extends Model
{
    protected $fillable = [
        'name',
        'type',
        'code',
    ];

    /**
     * Get the wards for the province.
     */
    public function wards(): HasMany
    {
        return $this->hasMany(Ward::class);
    }
}
