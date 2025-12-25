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
        Schema::create('apartments', function (Blueprint $table) {
            $table->id();
            
            // Basic Information
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->text('excerpt')->nullable(); // Short description for listings
            
            // Property Details
            $table->string('property_type')->default('apartment'); // apartment, villa, studio, condo
            $table->integer('bedrooms')->default(1);
            $table->integer('bathrooms')->default(1);
            $table->decimal('area', 10, 2)->nullable(); // Square meters
            $table->integer('floor')->nullable(); // Floor number
            $table->integer('total_floors')->nullable(); // Total floors in building
            
            // Location
            $table->string('location')->nullable(); // e.g., "Sunset Town, An Thoi"
            $table->string('address')->nullable(); // Full address
            $table->string('district')->nullable(); // e.g., "An Thoi", "Duong Dong"
            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();
            
            // Pricing
            $table->decimal('price_monthly', 12, 2)->nullable(); // Monthly rent in USD
            $table->decimal('price_daily', 12, 2)->nullable(); // Daily rent in USD
            $table->string('currency', 3)->default('USD'); // USD, VND
            $table->decimal('deposit', 12, 2)->nullable(); // Security deposit
            $table->text('pricing_notes')->nullable(); // Additional pricing info
            
            // Features & Amenities (JSON)
            $table->json('amenities')->nullable(); // ['wifi', 'pool', 'gym', 'parking', etc.]
            $table->json('features')->nullable(); // ['ocean_view', 'balcony', 'furnished', etc.]
            
            // Media
            $table->unsignedBigInteger('featured_image_id')->nullable(); // Curator media ID
            $table->json('gallery_image_ids')->nullable(); // Array of Curator media IDs
            
            // Status & Visibility
            $table->string('status')->default('available'); // available, rented, maintenance, sold
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_published')->default(true);
            $table->timestamp('published_at')->nullable();
            $table->timestamp('available_from')->nullable(); // When apartment becomes available
            
            // SEO - Enhanced for better ranking
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->json('meta_keywords')->nullable();
            $table->string('og_image_url')->nullable(); // Open Graph image
            $table->text('schema_markup')->nullable(); // JSON-LD structured data
            $table->string('canonical_url')->nullable(); // Canonical URL
            $table->boolean('noindex')->default(false); // Noindex flag
            $table->boolean('nofollow')->default(false); // Nofollow flag
            
            // Additional Info
            $table->text('notes')->nullable(); // Internal notes
            $table->json('extra')->nullable(); // Flexible JSON field for custom data
            
            // Relationships
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('updated_by')->nullable()->constrained('users')->nullOnDelete();
            
            $table->timestamps();
            $table->softDeletes();
            
            // Indexes
            $table->index('status');
            $table->index('is_published');
            $table->index('is_featured');
            $table->index('property_type');
            $table->index('bedrooms');
            $table->index('price_monthly');
            $table->index('district');
            $table->index('published_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apartments');
    }
};

