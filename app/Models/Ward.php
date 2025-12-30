<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ward extends Model
{
    protected $fillable = [
        'name',
        'province_id',
        'iorder',
        'type',
        'code',
    ];

    protected $casts = [
        'iorder' => 'integer',
    ];

    /**
     * Get the province that owns the ward.
     */
    public function province(): BelongsTo
    {
        return $this->belongsTo(Province::class);
    }
}
