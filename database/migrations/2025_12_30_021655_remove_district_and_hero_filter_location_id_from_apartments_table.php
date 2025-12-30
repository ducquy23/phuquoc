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
            // Drop foreign key if exists
            $table->dropForeign(['hero_filter_location_id']);
            // Drop columns
            $table->dropColumn(['district', 'hero_filter_location_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('apartments', function (Blueprint $table) {
            $table->string('district', 255)->nullable()->after('address');
            $table->unsignedBigInteger('hero_filter_location_id')->nullable()->after('district');
            $table->foreign('hero_filter_location_id')->references('id')->on('hero_filter_locations')->onDelete('set null');
        });
    }
};
