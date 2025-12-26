<?php

namespace App\Models;

use Awcodes\Curator\Models\Media;
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
        'hero_filter_property_type_id',
        'bedrooms',
        'hero_filter_bed_id',
        'bathrooms',
        'area',
        'floor',
        'total_floors',
        'location',
        'address',
        'district',
        'hero_filter_location_id',
        'latitude',
        'longitude',
        'google_maps_embed',
        'price_monthly',
        'price_daily',
        'currency',
        'deposit',
        'pricing_notes',
        'booking_policy',
        'cancellation_policy',
        'checkin_checkout_policy',
        'rules_policy',
        'nearby_attractions',
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
        'nearby_attractions' => 'array',
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

    /**
     * @return BelongsTo
     */
    public function heroFilterLocation(): BelongsTo
    {
        return $this->belongsTo(HeroFilterLocation::class, 'hero_filter_location_id');
    }

    /**
     * @return BelongsTo
     */
    public function heroFilterPropertyType(): BelongsTo
    {
        return $this->belongsTo(HeroFilterPropertyType::class, 'hero_filter_property_type_id');
    }

    /**
     * @return BelongsTo
     */
    public function heroFilterBed(): BelongsTo
    {
        return $this->belongsTo(HeroFilterBed::class, 'hero_filter_bed_id');
    }

    /**
     * Get featured image URL
     *
     * @return string
     */
    public function getFeaturedImageUrlAttribute(): string
    {
        // First try og_image_url
        if ($this->og_image_url) {
            return $this->og_image_url;
        }

        // Then try to get from Curator media
        if ($this->featured_image_id) {
            try {
                $media = Media::find($this->featured_image_id);
                if ($media && $media->url) {
                    return $media->url;
                }
            } catch (\Exception $e) {
                // Silently fail
            }
        }

        // Fallback to default image
        return asset('assets/images/Image-not-found.png');
    }

    /**
     * Get gallery images URLs
     *
     * @return array
     */
    public function getGalleryImageUrlsAttribute(): array
    {
        $urls = [];

        if ($this->gallery_image_ids && is_array($this->gallery_image_ids)) {
            foreach ($this->gallery_image_ids as $imageId) {
                try {
                    $media = Media::find($imageId);
                    if ($media && $media->url) {
                        $urls[] = $media->url;
                    }
                } catch (\Exception $e) {
                    // Silently fail
                }
            }
        }

        return $urls;
    }

    /**
     * Get formatted price
     *
     * @return string
     */
    public function getFormattedPriceMonthlyAttribute(): string
    {
        if (!$this->price_monthly) {
            return 'N/A';
        }

        $currency = $this->currency ?? 'USD';
        $symbol = $currency === 'USD' ? '$' : ($currency === 'VND' ? '₫' : $currency);

        return $symbol . number_format($this->price_monthly, 0);
    }

    /**
     * Get status badge color
     *
     * @return string
     */
    public function getStatusBadgeColorAttribute(): string
    {
        return match($this->status) {
            'available' => 'primary',
            'rented' => 'danger',
            'maintenance' => 'warning',
            default => 'gray',
        };
    }

    /**
     * Get status badge text
     *
     * @return string
     */
    public function getStatusBadgeTextAttribute(): string
    {
        if ($this->status === 'available' && $this->available_from) {
            if ($this->available_from->isFuture()) {
                return 'Available ' . $this->available_from->format('M j');
            }
            return 'Available Now';
        }

        return match($this->status) {
            'available' => 'Available',
            'rented' => 'Rented',
            'maintenance' => 'Maintenance',
            default => ucfirst($this->status ?? 'Unknown'),
        };
    }

    /**
     * Get property type display name
     *
     * @return string
     */
    public function getPropertyTypeDisplayAttribute(): string
    {
        return match($this->property_type) {
            'apartment' => 'Apartment',
            'villa' => 'Villa',
            'studio' => 'Studio',
            'condo' => 'Condo',
            default => ucfirst($this->property_type ?? 'Property'),
        };
    }

    /**
     * Get bedrooms display
     *
     * @return string
     */
    public function getBedroomsDisplayAttribute(): string
    {
        if ($this->bedrooms === 0) {
            return 'Studio';
        }
        return $this->bedrooms . ' Bed' . ($this->bedrooms > 1 ? 's' : '');
    }
}

