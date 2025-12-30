<?php

namespace App\Filament\Resources;

use Filament\Resources\Resource;

class SeoPageResource extends Resource
{
    protected static bool $shouldRegisterNavigation = false;

    public static function getPages(): array
    {
        return [];
    }
}
