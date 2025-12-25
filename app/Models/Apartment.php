<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Tags\HasTags;

class Apartment extends Model
{
    use HasFactory, SoftDeletes, HasTags;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'excerpt',
        'property_type',
        'bedrooms',
        'bathrooms',
        'area',
        'floor',
        'total_floors',
        'location',
        'address',
        'district',
        'latitude',
        'longitude',
        'price_monthly',
        'price_daily',
        'currency',
        'deposit',
        'pricing_notes',
        'amenities',
        'features',
        'featured_image_id',
        'gallery_image_ids',
        'status',
        'is_featured',
        'is_published',
        'published_at',
        'available_from',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'og_image_url',
        'schema_markup',
        'canonical_url',
        'noindex',
        'nofollow',
        'notes',
        'extra',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'is_published' => 'boolean',
        'noindex' => 'boolean',
        'nofollow' => 'boolean',
        'published_at' => 'datetime',
        'available_from' => 'datetime',
        'meta_keywords' => 'array',
        'amenities' => 'array',
        'features' => 'array',
        'gallery_image_ids' => 'array',
        'extra' => 'array',
        'bedrooms' => 'integer',
        'bathrooms' => 'integer',
        'floor' => 'integer',
        'total_floors' => 'integer',
        'area' => 'decimal:2',
        'price_monthly' => 'decimal:2',
        'price_daily' => 'decimal:2',
        'deposit' => 'decimal:2',
        'latitude' => 'decimal:8',
        'longitude' => 'decimal:8',
    ];

    /**
     * @return BelongsTo
     */
    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * @return BelongsTo
     */
    public function updater(): BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    /**
     * @return MorphToMany
     */
    public function categories(): MorphToMany
    {
        return $this->tags()->where('type', 'apartment_categories');
    }

    /**
     * @return MorphToMany
     */
    public function locationTags(): MorphToMany
    {
        return $this->tags()->where('type', 'locations');
    }
}

