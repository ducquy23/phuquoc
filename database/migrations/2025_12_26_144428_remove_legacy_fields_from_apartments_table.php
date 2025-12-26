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
            // Drop indexes first if they exist
            if (Schema::hasColumn('apartments', 'property_type')) {
                try {
                    $table->dropIndex(['property_type']);
                } catch (\Exception $e) {
                    // Index might not exist, continue
                }
            }
            
            if (Schema::hasColumn('apartments', 'bedrooms')) {
                try {
                    $table->dropIndex(['bedrooms']);
                } catch (\Exception $e) {
                    // Index might not exist, continue
                }
            }
            
            // Drop legacy columns that are now replaced by foreign key relationships
            $columnsToDrop = [];
            
            if (Schema::hasColumn('apartments', 'property_type')) {
                $columnsToDrop[] = 'property_type';
            }
            if (Schema::hasColumn('apartments', 'bedrooms')) {
                $columnsToDrop[] = 'bedrooms';
            }
            if (Schema::hasColumn('apartments', 'location')) {
                $columnsToDrop[] = 'location';
            }
            
            if (!empty($columnsToDrop)) {
                $table->dropColumn($columnsToDrop);
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('apartments', function (Blueprint $table) {
            // Re-add legacy columns for rollback
            $table->string('property_type')->default('apartment')->after('excerpt');
            $table->integer('bedrooms')->default(1)->after('hero_filter_property_type_id');
            $table->string('location')->nullable()->after('district');
            
            // Re-add indexes
            $table->index('property_type');
            $table->index('bedrooms');
        });
    }
};
