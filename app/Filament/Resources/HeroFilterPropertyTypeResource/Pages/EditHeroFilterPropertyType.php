<?php

namespace App\Filament\Resources\HeroFilterPropertyTypeResource\Pages;

use App\Filament\Resources\HeroFilterPropertyTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHeroFilterPropertyType extends EditRecord
{
    protected static string $resource = HeroFilterPropertyTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
