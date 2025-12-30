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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            
            // Relationships
            $table->foreignId('apartment_id')->constrained('apartments')->cascadeOnDelete();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('booking_id')->nullable()->constrained('bookings')->nullOnDelete(); // Link to booking
            
            // Guest Information (if not registered)
            $table->string('guest_name')->nullable();
            $table->string('guest_email')->nullable();
            
            // Review Content
            $table->string('title')->nullable();
            $table->text('content');
            
            // Ratings (1-5 stars)
            $table->tinyInteger('rating_overall')->default(5); // Overall rating
            $table->tinyInteger('rating_cleanliness')->nullable();
            $table->tinyInteger('rating_location')->nullable();
            $table->tinyInteger('rating_value')->nullable();
            $table->tinyInteger('rating_communication')->nullable();
            
            // Status
            $table->boolean('is_approved')->default(false); // Admin approval before showing
            $table->boolean('is_featured')->default(false);
            
            // Response from owner/admin
            $table->text('response')->nullable();
            $table->foreignId('responded_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamp('responded_at')->nullable();
            
            $table->timestamps();
            $table->softDeletes();
            
            // Indexes
            $table->index('apartment_id');
            $table->index('user_id');
            $table->index('is_approved');
            $table->index('rating_overall');
            $table->index('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};





