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
        Schema::table('apartments', function (Blueprint $table) {
            // Policy fields
            $table->text('booking_policy')->nullable()->after('pricing_notes');
            $table->text('cancellation_policy')->nullable()->after('booking_policy');
            $table->text('checkin_checkout_policy')->nullable()->after('cancellation_policy');
            $table->text('rules_policy')->nullable()->after('checkin_checkout_policy');
            
            // Nearby attractions (JSON array)
            $table->json('nearby_attractions')->nullable()->after('google_maps_embed');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('apartments', function (Blueprint $table) {
            $table->dropColumn([
                'booking_policy',
                'cancellation_policy',
                'checkin_checkout_policy',
                'rules_policy',
                'nearby_attractions',
            ]);
        });
    }
};
