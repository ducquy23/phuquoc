<?php

// Deprecated: SeoPage model has been removed along with the seo_pages table.
// The three SEO landing pages now use static Blade content only.

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SeoPage extends Model
{
    // Intentionally left minimal to avoid hard failures if referenced somewhere.
}
