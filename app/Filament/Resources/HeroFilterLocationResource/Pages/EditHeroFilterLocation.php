<?php

namespace App\Filament\Resources\HeroFilterLocationResource\Pages;

use App\Filament\Resources\HeroFilterLocationResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHeroFilterLocation extends EditRecord
{
    protected static string $resource = HeroFilterLocationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
