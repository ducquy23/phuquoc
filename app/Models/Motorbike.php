<?php

namespace App\Models;

use Awcodes\Curator\Models\Media;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Motorbike extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'type', // automatic, manual
        'engine_size', // 110cc, 125cc, 150cc, etc.
        'price_daily',
        'price_monthly',
        'currency',
        'featured_image_id',
        'gallery_image_ids',
        'status', // available, unavailable, maintenance
        'is_published',
        'is_featured',
        'sort_order',
        'published_at',
    ];

    protected $casts = [
        'price_daily' => 'decimal:2',
        'price_monthly' => 'decimal:2',
        'is_published' => 'boolean',
        'is_featured' => 'boolean',
        'sort_order' => 'integer',
        'published_at' => 'datetime',
        'gallery_image_ids' => 'array',
    ];

    /**
     * Get the featured image
     */
    public function featuredImage(): BelongsTo
    {
        return $this->belongsTo(Media::class, 'featured_image_id');
    }

    /**
     * Get featured image URL
     */
    public function getFeaturedImageUrlAttribute(): string
    {
        // Try to get from Curator media
        if ($this->featured_image_id) {
            try {
                $media = Media::find($this->featured_image_id);
                if ($media && $media->url) {
                    return $media->url;
                }
            } catch (\Exception $e) {
                // Silently fail and return fallback
            }
        }

        // Fallback to default image
        return asset('assets/images/Image-not-found.png');
    }

    /**
     * Get gallery image URLs
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
     * Get formatted daily price
     */
    public function getFormattedPriceDailyAttribute(): string
    {
        return '$' . number_format($this->price_daily, 0);
    }

    /**
     * Get formatted monthly price
     */
    public function getFormattedPriceMonthlyAttribute(): ?string
    {
        if (!$this->price_monthly) {
            return null;
        }
        return '$' . number_format($this->price_monthly, 0);
    }

    /**
     * Get type display name
     */
    public function getTypeDisplayAttribute(): string
    {
        return ucfirst($this->type ?? 'Automatic');
    }

    /**
     * Scope for published motorbikes
     */
    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    /**
     * Scope for available motorbikes
     */
    public function scopeAvailable($query)
    {
        return $query->where('status', 'available');
    }

    /**
     * Scope for featured motorbikes
     */
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    /**
     * Scope ordered by sort order
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order', 'asc')->orderBy('name', 'asc');
    }
}

