<?php

namespace App\Filament\Resources\HeroFilterBedResource\Pages;

use App\Filament\Resources\HeroFilterBedResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHeroFilterBed extends EditRecord
{
    protected static string $resource = HeroFilterBedResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
