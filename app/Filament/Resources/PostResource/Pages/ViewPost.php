<?php

namespace App\Filament\Resources\PostResource\Pages;

use App\Filament\Resources\PostResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewPost extends ViewRecord
{
    protected static string $resource = PostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('view_public')
                ->label('View Public Page')
                ->icon('heroicon-o-globe-alt')
                ->color('info')
                ->url(fn () => route('blog.show', $this->record->slug))
                ->openUrlInNewTab(),
            Actions\EditAction::make(),
            Actions\DeleteAction::make()
                ->requiresConfirmation()
                ->modalHeading('Delete Post')
                ->modalDescription('Are you sure you want to delete this post? This action will soft delete the post and it can be restored later.')
                ->modalSubmitActionLabel('Yes, Delete'),
        ];
    }
}
