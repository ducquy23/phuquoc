<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('pages', function (Blueprint $table) {
            // Enhanced SEO fields
            $table->json('meta_keywords')->nullable()->after('meta_description');
            $table->string('og_image_url')->nullable()->after('meta_keywords'); // Open Graph image
            $table->text('schema_markup')->nullable()->after('og_image_url'); // JSON-LD structured data
            $table->string('canonical_url')->nullable()->after('schema_markup'); // Canonical URL
            $table->boolean('noindex')->default(false)->after('canonical_url');
            $table->boolean('nofollow')->default(false)->after('noindex');
            $table->string('focus_keyword')->nullable()->after('nofollow'); // Primary keyword for SEO
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pages', function (Blueprint $table) {
            $table->dropColumn([
                'meta_keywords',
                'og_image_url',
                'schema_markup',
                'canonical_url',
                'noindex',
                'nofollow',
                'focus_keyword',
            ]);
        });
    }
};

