<?php

namespace App\Filament\Resources\MotorbikeResource\Pages;

use App\Filament\Resources\MotorbikeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMotorbikes extends ListRecords
{
    protected static string $resource = MotorbikeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
