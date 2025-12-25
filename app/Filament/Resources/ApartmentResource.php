<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ApartmentResource\Pages;
use App\Filament\Resources\ApartmentResource\RelationManagers;
use App\Models\Apartment;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\SpatieTagsInput;
use Filament\Tables\Columns\SpatieTagsColumn;

class ApartmentResource extends Resource
{
    protected static ?string $model = Apartment::class;

    protected static ?string $navigationIcon = 'heroicon-o-home';
    protected static ?string $navigationGroup = 'Properties';
    protected static ?int $navigationSort = 1;
    protected static ?string $label = 'Apartment';
    protected static ?string $pluralLabel = 'Apartments';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('slug')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('description')
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('excerpt')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('property_type')
                    ->required()
                    ->maxLength(255)
                    ->default('apartment'),
                Forms\Components\TextInput::make('bedrooms')
                    ->required()
                    ->numeric()
                    ->default(1),
                Forms\Components\TextInput::make('bathrooms')
                    ->required()
                    ->numeric()
                    ->default(1),
                Forms\Components\TextInput::make('area')
                    ->numeric(),
                Forms\Components\TextInput::make('floor')
                    ->numeric(),
                Forms\Components\TextInput::make('total_floors')
                    ->numeric(),
                Forms\Components\TextInput::make('location')
                    ->maxLength(255),
                Forms\Components\TextInput::make('address')
                    ->maxLength(255),
                Forms\Components\TextInput::make('district')
                    ->maxLength(255),
                Forms\Components\TextInput::make('latitude')
                    ->numeric(),
                Forms\Components\TextInput::make('longitude')
                    ->numeric(),
                Forms\Components\TextInput::make('price_monthly')
                    ->numeric(),
                Forms\Components\TextInput::make('price_daily')
                    ->numeric(),
                Forms\Components\TextInput::make('currency')
                    ->required()
                    ->maxLength(3)
                    ->default('USD'),
                Forms\Components\TextInput::make('deposit')
                    ->numeric(),
                Forms\Components\Textarea::make('pricing_notes')
                    ->columnSpanFull(),
                Forms\Components\Section::make('Tags & Categories')
                    ->schema([
                        SpatieTagsInput::make('tags')
                            ->label('Categories')
                            ->type('apartment_categories')
                            ->helperText('Categories: Studio, 1BR, 2BR, 3BR, v.v.')
                            ->columnSpan(1),
                        SpatieTagsInput::make('tags')
                            ->label('Location Tags')
                            ->type('locations')
                            ->helperText('Locations: Sunset Town, An Thoi, Duong Dong, v.v.')
                            ->columnSpan(1),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Amenities & Features')
                    ->schema([
                        Forms\Components\TagsInput::make('amenities')
                            ->label('Amenities')
                            ->helperText('e.g., wifi, pool, gym, parking'),
                        Forms\Components\TagsInput::make('features')
                            ->label('Features')
                            ->helperText('e.g., ocean_view, balcony, furnished'),
                    ])
                    ->columns(2)
                    ->collapsible(),

                Forms\Components\Section::make('Media')
                    ->schema([
                        Forms\Components\TextInput::make('featured_image_id')
                            ->label('Featured Image ID (Curator)')
                            ->numeric()
                            ->helperText('Enter the Curator media ID for the featured image'),
                        Forms\Components\Textarea::make('gallery_image_ids')
                            ->label('Gallery Image IDs (JSON array)')
                            ->helperText('Enter JSON array of Curator media IDs, e.g., [1, 2, 3]')
                            ->columnSpanFull(),
                    ])
                    ->collapsible(),
                Forms\Components\TextInput::make('status')
                    ->required()
                    ->maxLength(255)
                    ->default('available'),
                Forms\Components\Toggle::make('is_featured')
                    ->required(),
                Forms\Components\Toggle::make('is_published')
                    ->required(),
                Forms\Components\DateTimePicker::make('published_at'),
                Forms\Components\DateTimePicker::make('available_from'),
                Forms\Components\TextInput::make('meta_title')
                    ->maxLength(255),
                Forms\Components\Textarea::make('meta_description')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('meta_keywords'),
                Forms\Components\FileUpload::make('og_image_url')
                    ->image(),
                Forms\Components\Textarea::make('schema_markup')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('canonical_url')
                    ->maxLength(255),
                Forms\Components\Toggle::make('noindex')
                    ->required(),
                Forms\Components\Toggle::make('nofollow')
                    ->required(),
                Forms\Components\Textarea::make('notes')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('extra'),
                Forms\Components\Section::make('SEO Settings')
                    ->schema([
                        Forms\Components\TextInput::make('meta_title')
                            ->label('Meta Title')
                            ->maxLength(255),
                        Forms\Components\Textarea::make('meta_description')
                            ->label('Meta Description')
                            ->rows(3),
                        Forms\Components\TextInput::make('canonical_url')
                            ->label('Canonical URL')
                            ->url()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('og_image_url')
                            ->label('OG Image URL')
                            ->url()
                            ->maxLength(2048),
                        Forms\Components\Textarea::make('schema_markup')
                            ->label('Schema Markup (JSON-LD)')
                            ->rows(5),
                        Forms\Components\Toggle::make('noindex')
                            ->label('No Index'),
                        Forms\Components\Toggle::make('nofollow')
                            ->label('No Follow'),
                    ])
                    ->columns(2)
                    ->collapsible(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('property_type')
                    ->label('Type')
                    ->badge()
                    ->searchable(),
                Tables\Columns\TextColumn::make('bedrooms')
                    ->label('BR')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('bathrooms')
                    ->label('BA')
                    ->numeric()
                    ->sortable(),
                SpatieTagsColumn::make('tags')
                    ->label('Categories')
                    ->type('apartment_categories')
                    ->limit(2),
                SpatieTagsColumn::make('tags')
                    ->label('Locations')
                    ->type('locations')
                    ->limit(2),
                Tables\Columns\TextColumn::make('district')
                    ->label('District')
                    ->searchable(),
                Tables\Columns\TextColumn::make('price_monthly')
                    ->label('Monthly Price')
                    ->money('USD')
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->colors([
                        'success' => 'available',
                        'warning' => 'maintenance',
                        'danger' => 'rented',
                    ])
                    ->searchable(),
                Tables\Columns\IconColumn::make('is_featured')
                    ->label('Featured')
                    ->boolean(),
                Tables\Columns\IconColumn::make('is_published')
                    ->label('Published')
                    ->boolean(),
                Tables\Columns\TextColumn::make('published_at')
                    ->label('Published At')
                    ->dateTime('Y-m-d H:i')
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime('Y-m-d H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('published_at', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('property_type')
                    ->options([
                        'apartment' => 'Apartment',
                        'villa' => 'Villa',
                        'studio' => 'Studio',
                        'condo' => 'Condo',
                    ]),
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'available' => 'Available',
                        'rented' => 'Rented',
                        'maintenance' => 'Maintenance',
                        'sold' => 'Sold',
                    ]),
                Tables\Filters\TernaryFilter::make('is_published')
                    ->label('Published'),
                Tables\Filters\TernaryFilter::make('is_featured')
                    ->label('Featured'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListApartments::route('/'),
            'create' => Pages\CreateApartment::route('/create'),
            'edit' => Pages\EditApartment::route('/{record}/edit'),
        ];
    }
}
