<?php

namespace App\Filament\Resources\MotorbikeResource\Pages;

use App\Filament\Resources\MotorbikeResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewMotorbike extends ViewRecord
{
    protected static string $resource = MotorbikeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('view_public')
                ->label('View Public Page')
                ->icon('heroicon-o-globe-alt')
                ->color('info')
                ->url(fn () => route('motorbikes.show', $this->record->slug))
                ->openUrlInNewTab(),
            Actions\EditAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
