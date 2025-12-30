<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class LongTermRentalsPage extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationGroup = 'SEO Pages';
    protected static ?int $navigationSort = 1;
    protected static ?string $title = 'Long-Term Rentals Page';
    protected static ?string $navigationLabel = 'Long-Term Rentals';

    protected static string $view = 'filament.pages.long-term-rentals';
}




