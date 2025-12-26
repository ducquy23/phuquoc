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
        Schema::create('motorbikes', function (Blueprint $table) {
            $table->id();
            
            // Basic Information
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            
            // Specifications
            $table->string('type')->default('automatic'); // automatic, manual
            $table->string('engine_size')->nullable(); // 110cc, 125cc, 150cc, etc.
            
            // Pricing
            $table->decimal('price_daily', 10, 2);
            $table->decimal('price_monthly', 10, 2)->nullable();
            $table->string('currency', 3)->default('USD');
            
            // Media
            $table->unsignedBigInteger('featured_image_id')->nullable(); // Curator media ID
            
            // Status & Visibility
            $table->string('status')->default('available'); // available, unavailable, maintenance
            $table->boolean('is_published')->default(true);
            $table->boolean('is_featured')->default(false);
            $table->integer('sort_order')->default(0);
            $table->timestamp('published_at')->nullable();
            
            // Relationships
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('updated_by')->nullable()->constrained('users')->nullOnDelete();
            
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('motorbikes');
    }
};
