<?php

namespace App\Filament\Resources\HeroFilterPropertyTypeResource\Pages;

use App\Filament\Resources\HeroFilterPropertyTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListHeroFilterPropertyTypes extends ListRecords
{
    protected static string $resource = HeroFilterPropertyTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
