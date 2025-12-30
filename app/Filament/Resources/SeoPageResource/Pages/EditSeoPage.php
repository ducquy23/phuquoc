<?php

namespace App\Filament\Resources\SeoPageResource\Pages;

use App\Filament\Resources\SeoPageResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSeoPage extends EditRecord
{
    protected static string $resource = SeoPageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('view_public')
                ->label('View Public Page')
                ->icon('heroicon-o-globe-alt')
                ->color('success')
                ->url(fn (): string => match($this->record->slug) {
                    'long-term-rentals' => route('seo.long-term-rentals'),
                    'monthly-rentals' => route('seo.monthly-rentals'),
                    'phu-quoc-apartments-for-rent' => route('seo.phu-quoc-apartments-for-rent'),
                    default => '#',
                })
                ->openUrlInNewTab(),
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
