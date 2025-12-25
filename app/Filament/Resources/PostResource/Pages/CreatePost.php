<?php

namespace App\Filament\Resources\PostResource\Pages;

use App\Filament\Resources\PostResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Str;

class CreatePost extends CreateRecord
{
    protected static string $resource = PostResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // Auto-generate slug if empty
        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['title']);
        }

        // Auto-calculate reading time if empty (estimate: 200 words per minute)
        if (empty($data['reading_time']) && !empty($data['content'])) {
            $wordCount = str_word_count(strip_tags($data['content']));
            $data['reading_time'] = max(1, round($wordCount / 200));
        }

        // Set published_at if not set and is published
        if ($data['is_published'] && empty($data['published_at'])) {
            $data['published_at'] = now();
        }

        return $data;
    }
}
