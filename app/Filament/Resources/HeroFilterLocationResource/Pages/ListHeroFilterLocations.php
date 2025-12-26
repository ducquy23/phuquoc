<?php

namespace App\Filament\Resources\HeroFilterLocationResource\Pages;

use App\Filament\Resources\HeroFilterLocationResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListHeroFilterLocations extends ListRecords
{
    protected static string $resource = HeroFilterLocationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
