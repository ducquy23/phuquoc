<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class PhuQuocApartmentsPage extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-building-office';
    protected static ?string $navigationGroup = 'SEO Pages';
    protected static ?int $navigationSort = 3;
    protected static ?string $title = 'Phu Quoc Apartments Page';
    protected static ?string $navigationLabel = 'Phu Quoc Apartments';

    protected static string $view = 'filament.pages.phu-quoc-apartments';
}

