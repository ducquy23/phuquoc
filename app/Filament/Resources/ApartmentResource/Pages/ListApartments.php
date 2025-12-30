<?php

namespace App\Filament\Resources\ApartmentResource\Pages;

use App\Filament\Resources\ApartmentResource;
use App\Models\Apartment;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListApartments extends ListRecords
{
    protected static string $resource = ApartmentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        return [
            'all' => Tab::make('All')
                ->icon('heroicon-o-list-bullet')
                ->badge(fn () => Apartment::count()),
            'available' => Tab::make('Available')
                ->icon('heroicon-o-check-circle')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('status', 'available'))
                ->badge(fn () => Apartment::where('status', 'available')->count())
                ->badgeColor('success'),
            'rented' => Tab::make('Rented')
                ->icon('heroicon-o-x-circle')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('status', 'rented'))
                ->badge(fn () => Apartment::where('status', 'rented')->count())
                ->badgeColor('danger'),
            'maintenance' => Tab::make('Maintenance')
                ->icon('heroicon-o-wrench-screwdriver')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('status', 'maintenance'))
                ->badge(fn () => Apartment::where('status', 'maintenance')->count())
                ->badgeColor('warning'),
            'sold' => Tab::make('Sold')
                ->icon('heroicon-o-check-badge')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('status', 'sold'))
                ->badge(fn () => Apartment::where('status', 'sold')->count())
                ->badgeColor('gray'),
        ];
    }
}
