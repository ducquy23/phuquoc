<?php

namespace App\Models;

use Awcodes\Curator\Models\Media;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Tags\HasTags;

class Post extends Model
{
    use HasFactory, SoftDeletes, HasTags;

    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'content',
        'author_id',
        'featured_image_id',
        'category',
        'reading_time',
        'is_featured',
        'is_published',
        'published_at',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'og_image_url',
        'schema_markup',
        'canonical_url',
        'noindex',
        'nofollow',
        'focus_keyword',
        'views',
        'likes',
        'extra',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'is_published' => 'boolean',
        'noindex' => 'boolean',
        'nofollow' => 'boolean',
        'published_at' => 'datetime',
        'meta_keywords' => 'array',
        'extra' => 'array',
        'reading_time' => 'integer',
        'views' => 'integer',
        'likes' => 'integer',
    ];

    /**
     * @return BelongsTo
     */
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    /**
     * @return MorphToMany
     */
    public function blogTags(): MorphToMany
    {
        return $this->tags()->where('type', 'blog_tags');
    }

    /**
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
            }
        }

        // Fallback to default image
        return asset('assets/images/Image-not-found.png');
    }
}

