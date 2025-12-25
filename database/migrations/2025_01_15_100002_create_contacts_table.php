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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            
            // Contact Information
            $table->string('name');
            $table->string('phone'); // Required - main contact method
            $table->string('email')->nullable(); // Optional
            $table->string('zalo')->nullable(); // Zalo ID (popular in Vietnam)
            
            // Inquiry Type
            $table->string('inquiry_type')->default('booking'); // booking, question, general
            $table->string('subject')->nullable();
            $table->text('message')->nullable(); // Optional - phone is main method
            
            // Related Apartment (if inquiry is about specific apartment)
            $table->foreignId('apartment_id')->nullable()->constrained('apartments')->nullOnDelete();
            
            // Booking Info (simple - just for reference)
            $table->date('preferred_check_in')->nullable();
            $table->date('preferred_check_out')->nullable();
            $table->integer('preferred_guests')->nullable();
            
            // Status & Response
            $table->string('status')->default('new'); // new, read, replied, archived
            $table->text('admin_notes')->nullable(); // Internal notes
            $table->foreignId('responded_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamp('responded_at')->nullable();
            
            // Additional Info
            $table->string('ip_address')->nullable();
            $table->text('user_agent')->nullable();
            $table->json('extra')->nullable(); // Flexible JSON field
            
            $table->timestamps();
            
            // Indexes
            $table->index('status');
            $table->index('email');
            $table->index('apartment_id');
            $table->index('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};

