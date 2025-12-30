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
        Schema::table('seo_pages', function (Blueprint $table) {
            $table->text('map_embed_url')->nullable()->after('faqs');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('seo_pages', function (Blueprint $table) {
            $table->dropColumn('map_embed_url');
        });
    }
};


