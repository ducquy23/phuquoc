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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            
            // Booking Reference
            $table->string('booking_number')->unique(); // e.g., BK-2025-001
            
            // Relationships
            $table->foreignId('apartment_id')->constrained('apartments')->cascadeOnDelete();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete(); // Guest user (if registered)
            
            // Guest Information (if not registered user)
            $table->string('guest_name')->nullable();
            $table->string('guest_email')->nullable();
            $table->string('guest_phone')->nullable();
            
            // Booking Dates
            $table->date('check_in');
            $table->date('check_out');
            $table->integer('nights')->nullable(); // Calculated: check_out - check_in
            $table->integer('guests')->default(1);
            
            // Pricing
            $table->decimal('price_per_night', 12, 2)->nullable();
            $table->decimal('total_price', 12, 2);
            $table->decimal('deposit', 12, 2)->nullable();
            $table->decimal('balance', 12, 2)->nullable(); // Remaining balance
            $table->string('currency', 3)->default('USD');
            
            // Status
            $table->string('status')->default('pending'); // pending, confirmed, checked_in, checked_out, cancelled, refunded
            $table->string('payment_status')->default('pending'); // pending, partial, paid, refunded
            
            // Payment Info
            $table->string('payment_method')->nullable(); // cash, bank_transfer, credit_card, etc.
            $table->text('payment_notes')->nullable();
            $table->timestamp('paid_at')->nullable();
            
            // Special Requests
            $table->text('special_requests')->nullable();
            $table->text('admin_notes')->nullable(); // Internal notes
            
            // Cancellation
            $table->timestamp('cancelled_at')->nullable();
            $table->foreignId('cancelled_by')->nullable()->constrained('users')->nullOnDelete();
            $table->text('cancellation_reason')->nullable();
            
            // Additional Info
            $table->json('extra')->nullable(); // Flexible JSON field
            
            $table->timestamps();
            $table->softDeletes();
            
            // Indexes
            $table->index('booking_number');
            $table->index('apartment_id');
            $table->index('user_id');
            $table->index('status');
            $table->index('payment_status');
            $table->index('check_in');
            $table->index('check_out');
            $table->index('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};

