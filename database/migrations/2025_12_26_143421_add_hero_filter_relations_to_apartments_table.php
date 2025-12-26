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
            // Add foreign keys for hero filter relations
            $table->foreignId('hero_filter_location_id')
                ->nullable()
                ->after('district')
                ->constrained('hero_filter_locations')
                ->nullOnDelete();
            
            $table->foreignId('hero_filter_property_type_id')
                ->nullable()
                ->after('property_type')
                ->constrained('hero_filter_property_types')
                ->nullOnDelete();
            
            $table->foreignId('hero_filter_bed_id')
                ->nullable()
                ->after('bedrooms')
                ->constrained('hero_filter_beds')
                ->nullOnDelete();
            
            // Add indexes for better query performance
            $table->index('hero_filter_location_id');
            $table->index('hero_filter_property_type_id');
            $table->index('hero_filter_bed_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('apartments', function (Blueprint $table) {
            $table->dropForeign(['hero_filter_location_id']);
            $table->dropForeign(['hero_filter_property_type_id']);
            $table->dropForeign(['hero_filter_bed_id']);
            
            $table->dropIndex(['hero_filter_location_id']);
            $table->dropIndex(['hero_filter_property_type_id']);
            $table->dropIndex(['hero_filter_bed_id']);
            
            $table->dropColumn([
                'hero_filter_location_id',
                'hero_filter_property_type_id',
                'hero_filter_bed_id',
            ]);
        });
    }
};
