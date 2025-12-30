<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class MonthlyRentalsPage extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-calendar';
    protected static ?string $navigationGroup = 'SEO Pages';
    protected static ?int $navigationSort = 2;
    protected static ?string $title = 'Monthly Rentals Page';
    protected static ?string $navigationLabel = 'Monthly Rentals';

    protected static string $view = 'filament.pages.monthly-rentals';
}





