<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'email',
        'zalo',
        'inquiry_type',
        'subject',
        'message',
        'apartment_id',
        'preferred_check_in',
        'preferred_check_out',
        'preferred_guests',
        'status',
        'admin_notes',
        'responded_by',
        'responded_at',
        'ip_address',
        'user_agent',
        'extra',
    ];

    protected $casts = [
        'preferred_check_in' => 'date',
        'preferred_check_out' => 'date',
        'responded_at' => 'datetime',
        'extra' => 'array',
    ];

    /**
     * @return BelongsTo
     */
    public function apartment(): BelongsTo
    {
        return $this->belongsTo(Apartment::class);
    }

    /**
     * @return BelongsTo
     */
    public function respondedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'responded_by');
    }
}
