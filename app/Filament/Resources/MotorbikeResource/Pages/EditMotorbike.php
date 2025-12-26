<?php

namespace App\Filament\Resources\MotorbikeResource\Pages;

use App\Filament\Resources\MotorbikeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Auth;

class EditMotorbike extends EditRecord
{
    protected static string $resource = MotorbikeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $data['updated_by'] = Auth::id();
        
        return $data;
    }
}
