<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * 
     * NOTE: Với mục đích kinh doanh riêng lẻ, chỉ cần số điện thoại để liên hệ,
     * không cần booking system phức tạp. Bảng bookings có thể:
     * 1. Bỏ hoàn toàn (recommended)
     * 2. Hoặc giữ lại nhưng đơn giản hóa
     * 
     * Migration này để xóa bảng bookings nếu không cần.
     * Nếu muốn giữ lại, comment out phần này.
     */
    public function up(): void
    {
        // Option 1: Xóa bảng bookings (recommended cho business nhỏ)
        // Schema::dropIfExists('bookings');
        
        // Option 2: Giữ lại nhưng đơn giản hóa (uncomment nếu muốn)
        // Schema::table('bookings', function (Blueprint $table) {
        //     $table->dropColumn([
        //         'booking_number',
        //         'payment_status',
        //         'payment_method',
        //         'payment_notes',
        //         'paid_at',
        //         'cancelled_at',
        //         'cancelled_by',
        //         'cancellation_reason',
        //     ]);
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Nếu đã xóa, không cần rollback
        // Hoặc restore columns nếu đã đơn giản hóa
    }
};





