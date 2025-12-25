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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            
            // Basic Information
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('excerpt')->nullable(); // Short description for listings
            $table->longText('content')->nullable(); // Full content (HTML from rich editor)
            
            // Author
            $table->foreignId('author_id')->constrained('users')->cascadeOnDelete();
            
            // Media
            $table->unsignedBigInteger('featured_image_id')->nullable(); // Curator media ID
            
            // Categories & Tags (will use Spatie Tags plugin)
            $table->string('category')->nullable(); // Main category: apartment-hunting, local-life, travel-tips, legal-visa
            
            // Reading Info
            $table->integer('reading_time')->nullable(); // Estimated reading time in minutes
            
            // Status & Visibility
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_published')->default(true);
            $table->timestamp('published_at')->nullable();
            
            // SEO
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->json('meta_keywords')->nullable();
            
            // Statistics
            $table->integer('views')->default(0);
            $table->integer('likes')->default(0);
            
            // Additional Info
            $table->json('extra')->nullable(); // Flexible JSON field for custom data
            
            $table->timestamps();
            $table->softDeletes();
            
            // Indexes
            $table->index('is_published');
            $table->index('is_featured');
            $table->index('category');
            $table->index('author_id');
            $table->index('published_at');
            $table->index('views');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};

