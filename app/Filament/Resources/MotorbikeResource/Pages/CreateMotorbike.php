<?php

namespace App\Filament\Resources\MotorbikeResource\Pages;

use App\Filament\Resources\MotorbikeResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;

class CreateMotorbike extends CreateRecord
{
    protected static string $resource = MotorbikeResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['created_by'] = Auth::id();
        $data['updated_by'] = Auth::id();
        
        return $data;
    }
}
