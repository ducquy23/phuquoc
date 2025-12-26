<?php

namespace App\Filament\Resources\HeroFilterBedResource\Pages;

use App\Filament\Resources\HeroFilterBedResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListHeroFilterBeds extends ListRecords
{
    protected static string $resource = HeroFilterBedResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
