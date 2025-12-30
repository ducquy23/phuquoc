<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MotorbikeResource\Pages;
use App\Filament\Resources\MotorbikeResource\RelationManagers;
use App\Models\Motorbike;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Infolists\Infolist;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\ImageEntry;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Awcodes\Curator\Components\Forms\CuratorPicker;
use Awcodes\Curator\Components\Tables\CuratorColumn;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class MotorbikeResource extends Resource
{
    protected static ?string $model = Motorbike::class;

    protected static ?string $navigationIcon = 'heroicon-o-bolt';
    protected static ?string $navigationGroup = 'Rentals';
    protected static ?int $navigationSort = 2;
    protected static ?string $label = 'Motorbike';
    protected static ?string $pluralLabel = 'Motorbikes';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Tabs::make('MotorbikeTabs')
                    ->tabs([
                        Forms\Components\Tabs\Tab::make('Basic Information')
                            ->icon('heroicon-o-information-circle')
                            ->schema([
                                Forms\Components\TextInput::make('name')
                                    ->required()
                                    ->maxLength(255)
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(function (string $operation, $state, Forms\Set $set) {
                                        if ($operation !== 'create') {
                                            return;
                                        }
                                        $set('slug', Str::slug($state));
                                    })
                                    ->columnSpan(2),
                                Forms\Components\TextInput::make('slug')
                                    ->required()
                                    ->unique(ignoreRecord: true)
                                    ->maxLength(255)
                                    ->helperText('URL-friendly version of name. Auto-generated from name if left empty')
                                    ->columnSpan(2),
                                Forms\Components\Textarea::make('description')
                                    ->label('Description')
                                    ->rows(4)
                                    ->helperText('Optional description of the motorbike')
                                    ->columnSpanFull(),
                            ])
                            ->columns(2),

                        Forms\Components\Tabs\Tab::make('Specifications')
                            ->icon('heroicon-o-cog-6-tooth')
                            ->schema([
                                Forms\Components\Select::make('type')
                                    ->label('Transmission Type')
                                    ->options([
                                        'automatic' => 'Automatic (Scooter)',
                                        'manual' => 'Manual (Gear)',
                                    ])
                                    ->required()
                                    ->default('automatic')
                                    ->helperText('Automatic = Scooter (no gear shifting). Manual = Gear bike (requires gear shifting)')
                                    ->columnSpan(1),
                                Forms\Components\TextInput::make('engine_size')
                                    ->label('Engine Size')
                                    ->helperText('e.g., 110cc, 125cc, 150cc')
                                    ->maxLength(50)
                                    ->columnSpan(1),
                            ])
                            ->columns(2),

                        Forms\Components\Tabs\Tab::make('Pricing')
                            ->icon('heroicon-o-currency-dollar')
                            ->schema([
                                Forms\Components\TextInput::make('price_daily')
                                    ->label('Daily Price')
                                    ->required()
                                    ->numeric()
                                    ->step(1)
                                    ->afterStateHydrated(function ($component, $state) {
                                        if ($state !== null) {
                                            $component->state((int)$state);
                                        }
                                    })
                                    ->prefix('$')
                                    ->helperText('Price per day in USD')
                                    ->columnSpan(1),
                                Forms\Components\TextInput::make('price_monthly')
                                    ->label('Monthly Price')
                                    ->numeric()
                                    ->step(1)
                                    ->afterStateHydrated(function ($component, $state) {
                                        if ($state !== null) {
                                            $component->state((int)$state);
                                        }
                                    })
                                    ->prefix('$')
                                    ->helperText('Optional: Price per month in USD')
                                    ->columnSpan(1),
                                Forms\Components\Select::make('currency')
                                    ->label('Currency')
                                    ->options([
                                        'USD' => 'USD',
                                        'VND' => 'VND',
                                    ])
                                    ->default('USD')
                                    ->required()
                                    ->columnSpan(1),
                            ])
                            ->columns(3),

                        Forms\Components\Tabs\Tab::make('Media')
                            ->icon('heroicon-o-photo')
                            ->schema([
                                CuratorPicker::make('featured_image_id')
                                    ->label('Featured Image')
                                    ->helperText('Main image displayed in listings')
                                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                                    ->directory('motorbikes')
                                    ->columnSpanFull(),
                                CuratorPicker::make('gallery_image_ids')
                                    ->label('Gallery Images')
                                    ->helperText('Additional images for the motorbike gallery')
                                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                                    ->directory('motorbikes')
                                    ->multiple()
                                    ->maxItems(20)
                                    ->columnSpanFull(),
                            ]),

                        Forms\Components\Tabs\Tab::make('Status & Settings')
                            ->icon('heroicon-o-adjustments-horizontal')
                            ->schema([
                                Forms\Components\Select::make('status')
                                    ->options([
                                        'available' => 'Available',
                                        'unavailable' => 'Unavailable',
                                        'maintenance' => 'Maintenance',
                                    ])
                                    ->required()
                                    ->default('available')
                                    ->columnSpan(1),
                                Forms\Components\TextInput::make('sort_order')
                                    ->label('Sort Order')
                                    ->numeric()
                                    ->default(0)
                                    ->helperText('Lower numbers appear first')
                                    ->columnSpan(1),
                                Forms\Components\DateTimePicker::make('published_at')
                                    ->label('Published At')
                                    ->helperText('When to publish this motorbike')
                                    ->default(now())
                                    ->columnSpan(2),
                                Forms\Components\Toggle::make('is_published')
                                    ->label('Published')
                                    ->helperText('Show this motorbike on the website')
                                    ->default(true)
                                    ->columnSpan(1),
                                Forms\Components\Toggle::make('is_featured')
                                    ->label('Featured')
                                    ->helperText('Highlight this motorbike')
                                    ->default(false)
                                    ->columnSpan(1),
                            ])
                            ->columns(2),
                    ])
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->recordUrl(fn ($record) => static::getUrl('view', ['record' => $record]))
            ->columns([
                CuratorColumn::make('featured_image_id')
                    ->label('Image')
                    ->size(60)
                    ->circular(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),
                Tables\Columns\TextColumn::make('type')
                    ->label('Type')
                    ->formatStateUsing(fn (string $state): string => match($state) {
                        'automatic' => 'Automatic',
                        'manual' => 'Manual',
                        default => ucfirst($state),
                    })
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'automatic' => 'success',
                        'manual' => 'warning',
                        default => 'gray',
                    }),
                Tables\Columns\TextColumn::make('engine_size')
                    ->label('Engine')
                    ->searchable(),
                Tables\Columns\TextColumn::make('price_daily')
                    ->label('Daily Price')
                    ->formatStateUsing(fn ($state) => $state ? '$' . number_format($state, 0) : 'N/A')
                    ->sortable(),
                Tables\Columns\TextColumn::make('price_monthly')
                    ->label('Monthly Price')
                    ->formatStateUsing(fn ($state) => $state ? '$' . number_format($state, 0) : '—')
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_published')
                    ->label('Published')
                    ->boolean()
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_featured')
                    ->label('Featured')
                    ->boolean()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'available' => 'success',
                        'unavailable' => 'danger',
                        'maintenance' => 'warning',
                        default => 'gray',
                    })
                    ->sortable(),
                Tables\Columns\TextColumn::make('sort_order')
                    ->label('Order')
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'available' => 'Available',
                        'unavailable' => 'Unavailable',
                        'maintenance' => 'Maintenance',
                    ]),
                Tables\Filters\SelectFilter::make('type')
                    ->options([
                        'automatic' => 'Automatic',
                        'manual' => 'Manual',
                    ]),
                Tables\Filters\TernaryFilter::make('is_published')
                    ->label('Published')
                    ->placeholder('All')
                    ->trueLabel('Published only')
                    ->falseLabel('Unpublished only'),
                Tables\Filters\TernaryFilter::make('is_featured')
                    ->label('Featured')
                    ->placeholder('All')
                    ->trueLabel('Featured only')
                    ->falseLabel('Not featured'),
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\RestoreAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('sort_order', 'asc');
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Section::make('Overview')
                    ->icon('heroicon-o-information-circle')
                    ->schema([
                        ImageEntry::make('featured_image_id')
                            ->label('Featured Image')
                            ->getStateUsing(function ($record) {
                                if ($record->featured_image_id) {
                                    try {
                                        $media = \Awcodes\Curator\Models\Media::find($record->featured_image_id);
                                        return $media?->url ?? asset('assets/images/Image-not-found.png');
                                    } catch (\Exception $e) {
                                        return asset('assets/images/Image-not-found.png');
                                    }
                                }
                                return asset('assets/images/Image-not-found.png');
                            })
                            ->height(300)
                            ->columnSpanFull(),
                        TextEntry::make('name')
                            ->label('Name')
                            ->size(TextEntry\TextEntrySize::Large)
                            ->weight('bold')
                            ->icon('heroicon-o-bolt')
                            ->columnSpan(2),
                        TextEntry::make('slug')
                            ->label('Slug')
                            ->icon('heroicon-o-link')
                            ->copyable()
                            ->columnSpan(1),
                        TextEntry::make('description')
                            ->label('Description')
                            ->icon('heroicon-o-document-text')
                            ->placeholder('No description')
                            ->columnSpanFull(),
                    ])
                    ->columns(3),

                Section::make('Specifications')
                    ->icon('heroicon-o-cog-6-tooth')
                    ->schema([
                        TextEntry::make('type')
                            ->label('Transmission Type')
                            ->badge()
                            ->formatStateUsing(fn ($state) => match($state) {
                                'automatic' => 'Automatic (Scooter)',
                                'manual' => 'Manual (Gear)',
                                default => ucfirst($state),
                            })
                            ->color(fn ($state) => match($state) {
                                'automatic' => 'success',
                                'manual' => 'warning',
                                default => 'gray',
                            })
                            ->icon('heroicon-o-cog-6-tooth')
                            ->columnSpan(1),
                        TextEntry::make('engine_size')
                            ->label('Engine Size')
                            ->badge()
                            ->color('info')
                            ->icon('heroicon-o-bolt')
                            ->formatStateUsing(fn ($state) => $state ?: 'N/A')
                            ->columnSpan(1),
                    ])
                    ->columns(2),

                Section::make('Pricing')
                    ->icon('heroicon-o-currency-dollar')
                    ->schema([
                        TextEntry::make('price_daily')
                            ->label('Daily Price')
                            ->size(TextEntry\TextEntrySize::Large)
                            ->weight('bold')
                            ->color('success')
                            ->icon('heroicon-o-calendar-days')
                            ->formatStateUsing(fn ($state) => $state ? '$' . number_format($state, 0) . '/day' : 'N/A')
                            ->columnSpan(1),
                        TextEntry::make('price_monthly')
                            ->label('Monthly Price')
                            ->size(TextEntry\TextEntrySize::Large)
                            ->weight('bold')
                            ->color('info')
                            ->icon('heroicon-o-calendar')
                            ->formatStateUsing(fn ($state) => $state ? '$' . number_format($state, 0) . '/month' : 'N/A')
                            ->columnSpan(1),
                        TextEntry::make('currency')
                            ->label('Currency')
                            ->badge()
                            ->icon('heroicon-o-banknotes')
                            ->columnSpan(1),
                    ])
                    ->columns(3),

                Section::make('Status & Settings')
                    ->icon('heroicon-o-adjustments-horizontal')
                    ->schema([
                        TextEntry::make('status')
                            ->label('Status')
                            ->badge()
                            ->formatStateUsing(fn ($state) => ucfirst($state))
                            ->color(fn ($state) => match($state) {
                                'available' => 'success',
                                'unavailable' => 'danger',
                                'maintenance' => 'warning',
                                default => 'gray',
                            })
                            ->icon('heroicon-o-check-circle')
                            ->columnSpan(1),
                        TextEntry::make('is_featured')
                            ->label('Featured')
                            ->badge()
                            ->formatStateUsing(fn ($state) => $state ? 'Yes' : 'No')
                            ->color(fn ($state) => $state ? 'success' : 'gray')
                            ->icon('heroicon-o-star')
                            ->columnSpan(1),
                        TextEntry::make('is_published')
                            ->label('Published')
                            ->badge()
                            ->formatStateUsing(fn ($state) => $state ? 'Yes' : 'No')
                            ->color(fn ($state) => $state ? 'success' : 'danger')
                            ->icon('heroicon-o-eye')
                            ->columnSpan(1),
                        TextEntry::make('sort_order')
                            ->label('Sort Order')
                            ->icon('heroicon-o-arrow-up')
                            ->columnSpan(1),
                        TextEntry::make('published_at')
                            ->label('Published At')
                            ->dateTime('F d, Y \a\t g:i A')
                            ->icon('heroicon-o-calendar')
                            ->placeholder('Not published')
                            ->columnSpan(1),
                    ])
                    ->columns(3)
                    ->collapsible(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMotorbikes::route('/'),
            'create' => Pages\CreateMotorbike::route('/create'),
            'view' => Pages\ViewMotorbike::route('/{record}'),
            'edit' => Pages\EditMotorbike::route('/{record}/edit'),
        ];
    }
}
