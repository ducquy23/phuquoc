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
            $table->boolean('show_sidebar_search')->default(true)->after('map_embed_url');
            $table->boolean('show_sidebar_agent')->default(true)->after('show_sidebar_search');
            $table->boolean('show_sidebar_related')->default(true)->after('show_sidebar_agent');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('seo_pages', function (Blueprint $table) {
            $table->dropColumn([
                'show_sidebar_search',
                'show_sidebar_agent',
                'show_sidebar_related',
            ]);
        });
    }
};

