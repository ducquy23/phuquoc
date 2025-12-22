<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('template')->default('default'); // ví dụ: default, seo, landing,...
            $table->longText('body')->nullable(); // nội dung HTML chính (editor trong Filament)
            $table->json('extra')->nullable(); // các config khác cho template, dạng JSON
            $table->string('hero_image_url')->nullable(); // URL ảnh hero đơn giản, không phụ thuộc Curator
            $table->boolean('is_home')->default(false); // đánh dấu trang home nếu muốn
            $table->boolean('is_published')->default(true);
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};


