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
        // Indexes for apartments table
        Schema::table('apartments', function (Blueprint $table) {
            $table->index('is_published', 'apartments_is_published_idx');
            $table->index('status', 'apartments_status_idx');
            $table->index('published_at', 'apartments_published_at_idx');
            $table->index('is_featured', 'apartments_is_featured_idx');
            $table->index(['is_published', 'status'], 'apartments_published_status_idx');
            $table->index(['is_published', 'published_at'], 'apartments_published_date_idx');
        });

        // Indexes for posts table
        Schema::table('posts', function (Blueprint $table) {
            $table->index('is_published', 'posts_is_published_idx');
            $table->index('is_featured', 'posts_is_featured_idx');
            $table->index('published_at', 'posts_published_at_idx');
            $table->index('category', 'posts_category_idx');
            $table->index(['is_published', 'is_featured'], 'posts_published_featured_idx');
            $table->index(['is_published', 'published_at'], 'posts_published_date_idx');
        });

        // Indexes for motorbikes table
        Schema::table('motorbikes', function (Blueprint $table) {
            $table->index('is_published', 'motorbikes_is_published_idx');
            $table->index('status', 'motorbikes_status_idx');
            $table->index('published_at', 'motorbikes_published_at_idx');
            $table->index('is_featured', 'motorbikes_is_featured_idx');
            $table->index(['is_published', 'status'], 'motorbikes_published_status_idx');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop indexes for apartments table
        Schema::table('apartments', function (Blueprint $table) {
            $table->dropIndex('apartments_is_published_idx');
            $table->dropIndex('apartments_status_idx');
            $table->dropIndex('apartments_published_at_idx');
            $table->dropIndex('apartments_is_featured_idx');
            $table->dropIndex('apartments_published_status_idx');
            $table->dropIndex('apartments_published_date_idx');
        });

        // Drop indexes for posts table
        Schema::table('posts', function (Blueprint $table) {
            $table->dropIndex('posts_is_published_idx');
            $table->dropIndex('posts_is_featured_idx');
            $table->dropIndex('posts_published_at_idx');
            $table->dropIndex('posts_category_idx');
            $table->dropIndex('posts_published_featured_idx');
            $table->dropIndex('posts_published_date_idx');
        });

        // Drop indexes for motorbikes table
        Schema::table('motorbikes', function (Blueprint $table) {
            $table->dropIndex('motorbikes_is_published_idx');
            $table->dropIndex('motorbikes_status_idx');
            $table->dropIndex('motorbikes_published_at_idx');
            $table->dropIndex('motorbikes_is_featured_idx');
            $table->dropIndex('motorbikes_published_status_idx');
        });
    }
};
