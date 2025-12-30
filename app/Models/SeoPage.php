<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SeoPage extends Model
{
    protected $fillable = [
        'slug',
        'title',
        'meta_description',
        'meta_keywords',
        'hero_title',
        'hero_subtitle',
        'hero_badge_text',
        'hero_background_image_url',
        'hero_cta_primary_text',
        'hero_cta_primary_link',
        'hero_cta_secondary_text',
        'hero_cta_secondary_link',
        'sidebar_search_title',
        'sidebar_search_description',
        'sidebar_search_button_text',
        'sidebar_agent_name',
        'sidebar_agent_title',
        'sidebar_agent_image_url',
        'sidebar_agent_description',
        'sidebar_agent_whatsapp',
        'sidebar_agent_zalo',
        'content_sections',
        'features',
        'faqs',
        'map_embed_url',
        'show_sidebar_search',
        'show_sidebar_agent',
        'show_sidebar_related',
    ];

    protected $casts = [
        'content_sections' => 'array',
        'features' => 'array',
        'faqs' => 'array',
        'show_sidebar_search' => 'boolean',
        'show_sidebar_agent' => 'boolean',
        'show_sidebar_related' => 'boolean',
    ];

    /**
     * Get SEO page by slug
     */
    public static function getBySlug(string $slug): ?self
    {
        return static::where('slug', $slug)->first();
    }

    /**
     * Get or create SEO page by slug
     */
    public static function getOrCreateBySlug(string $slug): self
    {
        return static::firstOrCreate(
            ['slug' => $slug],
            ['title' => ucfirst(str_replace('-', ' ', $slug))]
        );
    }
}
