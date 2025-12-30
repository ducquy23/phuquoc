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
            // Sidebar search widget config
            $table->string('sidebar_search_title')->nullable();
            $table->text('sidebar_search_description')->nullable();
            $table->string('sidebar_search_button_text')->nullable();

            // Agent contact card config
            $table->string('sidebar_agent_name')->nullable();
            $table->string('sidebar_agent_title')->nullable();
            $table->string('sidebar_agent_image_url')->nullable();
            $table->text('sidebar_agent_description')->nullable();
            $table->string('sidebar_agent_whatsapp')->nullable();
            $table->string('sidebar_agent_zalo')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('seo_pages', function (Blueprint $table) {
            $table->dropColumn([
                'sidebar_search_title',
                'sidebar_search_description',
                'sidebar_search_button_text',
                'sidebar_agent_name',
                'sidebar_agent_title',
                'sidebar_agent_image_url',
                'sidebar_agent_description',
                'sidebar_agent_whatsapp',
                'sidebar_agent_zalo',
            ]);
        });
    }
};


