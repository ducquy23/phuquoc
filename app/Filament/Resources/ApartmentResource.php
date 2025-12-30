<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ApartmentResource\Pages;
use App\Models\Apartment;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Infolists\Infolist;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\TextEntry\TextEntrySize;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Forms\Components\SpatieTagsInput;
use Filament\Tables\Columns\SpatieTagsColumn;
use Awcodes\Curator\Components\Forms\CuratorPicker;

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
                Forms\Components\Tabs::make('ApartmentTabs')
                    ->tabs([
                        Forms\Components\Tabs\Tab::make('Basic Information')
                            ->icon('heroicon-o-information-circle')
                            ->schema([
                                Forms\Components\TextInput::make('title')
                                    ->required()
                                    ->maxLength(255)
                                    ->columnSpan(2),
                                Forms\Components\TextInput::make('slug')
                                    ->required()
                                    ->unique(ignoreRecord: true)
                                    ->maxLength(255)
                                    ->helperText('URL-friendly version of title. Auto-generated from title if left empty')
                                    ->columnSpan(2),
                                Forms\Components\Textarea::make('excerpt')
                                    ->label('Excerpt')
                                    ->rows(3)
                                    ->helperText('Short description for listings')
                                    ->columnSpanFull(),
                                Forms\Components\Textarea::make('description')
                                    ->label('Description')
                                    ->rows(5)
                                    ->helperText('Full description of the property')
                                    ->columnSpanFull(),
                                Forms\Components\Select::make('hero_filter_property_type_id')
                                    ->label('Property Type')
                                    ->relationship('heroFilterPropertyType', 'name')
                                    ->searchable()
                                    ->preload()
                                    ->required()
                                    ->helperText('Select from configured property types')
                                    ->columnSpan(1),
                                Forms\Components\Select::make('hero_filter_bed_id')
                                    ->label('Bedrooms')
                                    ->relationship('heroFilterBed', 'name')
                                    ->searchable()
                                    ->preload()
                                    ->required()
                                    ->helperText('Select bed option (e.g., 1 Bed, 2 Beds)')
                                    ->columnSpan(1),
                                Forms\Components\TextInput::make('bathrooms')
                                    ->label('Bathrooms')
                                    ->required()
                                    ->numeric()
                                    ->default(1)
                                    ->columnSpan(1),
                                Forms\Components\TextInput::make('area')
                                    ->label('Area (m²)')
                                    ->numeric()
                                    ->step(1)
                                    ->afterStateHydrated(function ($component, $state) {
                                        if ($state !== null) {
                                            $component->state((int)$state);
                                        }
                                    })
                                    ->suffix('m²')
                                    ->helperText('Total area in square meters')
                                    ->columnSpan(1),
                                Forms\Components\TextInput::make('floor')
                                    ->label('Floor')
                                    ->numeric()
                                    ->helperText('Floor number of the apartment')
                                    ->columnSpan(1),
                                Forms\Components\TextInput::make('total_floors')
                                    ->label('Total Floors')
                                    ->numeric()
                                    ->helperText('Total number of floors in the building')
                                    ->columnSpan(1),
                            ])
                            ->columns(2),

                        Forms\Components\Tabs\Tab::make('Location & Pricing')
                            ->icon('heroicon-o-map-pin')
                            ->schema([
                                Grid::make(2)
                                    ->schema([
                                        Select::make('ward_id')
                                            ->label('Ward')
                                            ->relationship(
                                                'ward',
                                                'name',
                                                fn($query) => $query->where('province_id', 35)
                                            )
                                            ->searchable()
                                            ->preload()
                                            ->helperText('Select ward')
                                            ->columnSpan(1),

                                        TextInput::make('address')
                                            ->label('Full Address')
                                            ->maxLength(255)
                                            ->helperText('Complete address of the property')
                                            ->columnSpan(1),
                                    ]),
                                Forms\Components\Textarea::make('google_maps_embed')
                                    ->label('Google Maps Embed')
                                    ->rows(3)
                                    ->helperText('Paste the Google Maps iframe code here. The coordinates will be automatically extracted and saved to the database.')
                                    ->placeholder('<iframe src="https://www.google.com/maps/embed?pb=..." width="600" height="450" style="border:0;"></iframe>')
                                    ->dehydrated()
                                    ->afterStateUpdated(function ($state, Forms\Set $set) {
                                        if ($state) {
                                            $coordinates = self::extractCoordinatesFromEmbed($state);
                                            if ($coordinates) {
                                                $set('latitude', $coordinates['lat']);
                                                $set('longitude', $coordinates['lng']);
                                            }
                                        }
                                    })
                                    ->columnSpanFull(),
                                Forms\Components\Section::make('Pricing')
                                    ->schema([
                                        Forms\Components\TextInput::make('price_monthly')
                                            ->label('Monthly Price')
                                            ->numeric()
                                            ->step(1)
                                            ->prefix('$')
                                            ->helperText('Monthly rental price')
                                            ->afterStateHydrated(function ($component, $state) {
                                                if ($state !== null) {
                                                    $component->state((int)$state);
                                                }
                                            })
                                            ->columnSpan(1),
                                        Forms\Components\TextInput::make('price_daily')
                                            ->label('Daily Price')
                                            ->numeric()
                                            ->step(1)
                                            ->prefix('$')
                                            ->helperText('Daily rental price (for short-term)')
                                            ->afterStateHydrated(function ($component, $state) {
                                                if ($state !== null) {
                                                    $component->state((int)$state);
                                                }
                                            })
                                            ->columnSpan(1),
                                        Forms\Components\TextInput::make('deposit')
                                            ->label('Deposit')
                                            ->numeric()
                                            ->step(1)
                                            ->prefix('$')
                                            ->afterStateHydrated(function ($component, $state) {
                                                if ($state !== null) {
                                                    $component->state((int)$state);
                                                }
                                            })
                                            ->helperText('Security deposit amount')
                                            ->columnSpan(1),
                                        Forms\Components\Select::make('currency')
                                            ->label('Currency')
                                            ->options([
                                                'USD' => 'USD ($)',
                                                'VND' => 'VND (₫)',
                                            ])
                                            ->required()
                                            ->default('USD')
                                            ->columnSpan(1),
                                        Forms\Components\Textarea::make('pricing_notes')
                                            ->label('Pricing Notes')
                                            ->rows(3)
                                            ->helperText('Additional notes about pricing (e.g., utilities included/excluded)')
                                            ->columnSpanFull(),
                                    ])
                                    ->columns(2)
                                    ->collapsible(),
                                Forms\Components\Repeater::make('nearby_attractions')
                                    ->label('Nearby Attractions')
                                    ->schema([
                                        Forms\Components\TextInput::make('name')
                                            ->label('Name')
                                            ->required()
                                            ->maxLength(255),
                                        Forms\Components\TextInput::make('distance')
                                            ->label('Distance')
                                            ->maxLength(50)
                                            ->helperText('e.g., "500m", "1.2km", "5 min walk"'),
                                    ])
                                    ->itemLabel(function (array $state): ?string {
                                        return $state['name'] ?? 'New Attraction';
                                    })
                                    ->defaultItems(0)
                                    ->addActionLabel('Add Attraction')
                                    ->reorderableWithButtons()
                                    ->collapsible()
                                    ->helperText('Add nearby attractions, landmarks, or points of interest')
                                    ->columnSpanFull(),
                            ])
                            ->columns(2),

                        Forms\Components\Tabs\Tab::make('Policies')
                            ->icon('heroicon-o-document-check')
                            ->schema([
                                Forms\Components\Textarea::make('booking_policy')
                                    ->label('Booking and cancellation')
                                    ->rows(4)
                                    ->helperText('Policy for booking and cancellation')
                                    ->placeholder('Its recommended to contact the hotline or Zalo directly to confirm pricing and room availability, especially on weekends or during peak tourist season.')
                                    ->columnSpanFull(),
                                Forms\Components\Textarea::make('checkin_checkout_policy')
                                    ->label('Check-in/Check-out')
                                    ->rows(4)
                                    ->helperText('Check-in and check-out policy')
                                    ->placeholder('Policies may be flexible or specifically stated when making a reservation.')
                                    ->columnSpanFull(),
                                Forms\Components\Textarea::make('rules_policy')
                                    ->label('Other regulations')
                                    ->rows(4)
                                    ->helperText('Other rules and regulations')
                                    ->placeholder('It is necessary to adhere to the general rules of the homestay regarding hygiene and order to ensure a comfortable resting space for everyone.')
                                    ->columnSpanFull(),
                                Forms\Components\Textarea::make('cancellation_policy')
                                    ->label('Cancellation Policy (Optional)')
                                    ->rows(4)
                                    ->helperText('Detailed cancellation policy (optional, will use booking_policy if empty)')
                                    ->columnSpanFull(),
                            ]),

                        Forms\Components\Tabs\Tab::make('Content & Features')
                            ->icon('heroicon-o-sparkles')
                            ->schema([
                                Forms\Components\Section::make('Tags & Categories')
                                    ->schema([
                                        SpatieTagsInput::make('tags')
                                            ->label('Categories')
                                            ->type('apartment_categories')
                                            ->helperText('Categories: Studio, 1BR, 2BR, 3BR, etc.')
                                            ->columnSpan(1),
                                        SpatieTagsInput::make('tags')
                                            ->label('Location Tags')
                                            ->type('locations')
                                            ->helperText('Locations: Sunset Town, An Thoi, Duong Dong, etc.')
                                            ->columnSpan(1),
                                    ])
                                    ->columns(2)
                                    ->collapsible(),
                                Forms\Components\Section::make('Amenities & Features')
                                    ->schema([
                                        Forms\Components\CheckboxList::make('amenities')
                                            ->label('Amenities')
                                            ->options(function () {
                                                $amenities = config('amenities.list', []);
                                                return collect($amenities)->mapWithKeys(function ($item, $key) {
                                                    return [$key => $item['label'] ?? ucfirst(str_replace('_', ' ', $key))];
                                                })->toArray();
                                            })
                                            ->bulkToggleable()
                                            ->columns(3)
                                            ->helperText('Chọn các tiện ích có sẵn cho phòng')
                                            ->columnSpan(1),
                                        Forms\Components\TagsInput::make('features')
                                            ->label('Features')
                                            ->helperText('e.g., ocean_view, firework_view, balcony, furnished, modern_kitchen')
                                            ->columnSpan(1),
                                    ])
                                    ->columns(2)
                                    ->collapsible(),
                            ]),

                        Forms\Components\Tabs\Tab::make('Media')
                            ->icon('heroicon-o-photo')
                            ->schema([
                                CuratorPicker::make('featured_image_id')
                                    ->label('Featured Image')
                                    ->helperText('Select featured image from Curator media library')
                                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp', 'image/gif'])
                                    ->directory('apartments')
                                    ->visibility('public')
                                    ->columnSpan(1),
                                Forms\Components\TextInput::make('og_image_url')
                                    ->label('OG Image URL (Alternative)')
                                    ->url()
                                    ->maxLength(2048)
                                    ->helperText('Or provide direct image URL for Open Graph (optional)')
                                    ->columnSpan(1),
                                Forms\Components\Repeater::make('gallery_images')
                                    ->label('Gallery Images')
                                    ->schema([
                                        CuratorPicker::make('image_id')
                                            ->label('Image')
                                            ->helperText('Select image from Curator media library')
                                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp', 'image/gif'])
                                            ->directory('apartments')
                                            ->visibility('public')
                                            ->required(),
                                    ])
                                    ->itemLabel(function (array $state): ?string {
                                        $imageId = $state['image_id'] ?? null;
                                        if ($imageId === null) {
                                            return 'New Image';
                                        }
                                        if (is_array($imageId)) {
                                            $imageId = $imageId['id'] ?? $imageId[0] ?? null;
                                            if ($imageId === null) {
                                                return 'New Image';
                                            }
                                        }
                                        if (is_numeric($imageId)) {
                                            return "Image ID: {$imageId}";
                                        }
                                        if (is_string($imageId)) {
                                            return $imageId;
                                        }
                                        // Fallback
                                        return 'New Image';
                                    })
                                    ->defaultItems(0)
                                    ->addActionLabel('Add Gallery Image')
                                    ->reorderableWithButtons()
                                    ->collapsible()
                                    ->helperText('Add multiple images for the gallery. Images will be saved as an array of IDs.')
                                    ->afterStateHydrated(function ($component, $state) {
                                        // Ensure state is always an array
                                        if (!is_array($state)) {
                                            $component->state([]);
                                        }
                                    })
                                    ->afterStateUpdated(function ($state, Forms\Set $set) {
                                        // Convert repeater data to array of IDs
                                        if (is_array($state) && count($state) > 0) {
                                            $ids = [];
                                            foreach ($state as $item) {
                                                if (isset($item['image_id']) && $item['image_id'] !== null) {
                                                    $imageId = $item['image_id'];
                                                    // Extract ID from various formats
                                                    $id = self::extractMediaIdFromValue($imageId);
                                                    if ($id && is_numeric($id)) {
                                                        $ids[] = (int)$id;
                                                    }
                                                }
                                            }
                                            $set('gallery_image_ids', array_values(array_filter($ids)));
                                        } else {
                                            $set('gallery_image_ids', []);
                                        }
                                    })
                                    ->dehydrated(false) // Don't save repeater data directly
                                    ->columnSpanFull(),
                                Forms\Components\Hidden::make('gallery_image_ids')
                                    ->dehydrated(),
                            ])
                            ->columns(2),

                        Forms\Components\Tabs\Tab::make('Settings & SEO')
                            ->icon('heroicon-o-cog-6-tooth')
                            ->schema([
                                Forms\Components\Section::make('Status & Publication')
                                    ->schema([
                                        Forms\Components\Select::make('status')
                                            ->label('Status')
                                            ->options([
                                                'available' => 'Available',
                                                'rented' => 'Rented',
                                                'maintenance' => 'Maintenance',
                                                'sold' => 'Sold',
                                            ])
                                            ->required()
                                            ->default('available')
                                            ->columnSpan(1),
                                        Forms\Components\DateTimePicker::make('published_at')
                                            ->label('Published At')
                                            ->default(now())
                                            ->helperText('Publication date')
                                            ->columnSpan(1),
                                        Forms\Components\DateTimePicker::make('available_from')
                                            ->label('Available From')
                                            ->helperText('Date when apartment becomes available')
                                            ->columnSpan(1),
                                        Forms\Components\Toggle::make('is_featured')
                                            ->label('Featured')
                                            ->helperText('Show this apartment as featured on listings')
                                            ->columnSpan(1),
                                        Forms\Components\Toggle::make('is_published')
                                            ->label('Published')
                                            ->default(true)
                                            ->helperText('Make this apartment visible on the website')
                                            ->columnSpan(1),
                                    ])
                                    ->columns(2)
                                    ->collapsible(),
                                Forms\Components\Section::make('SEO Settings')
                                    ->schema([
                                        Forms\Components\TextInput::make('meta_title')
                                            ->label('Meta Title')
                                            ->maxLength(255)
                                            ->helperText('Leave empty to use apartment title')
                                            ->columnSpan(2),
                                        Forms\Components\Textarea::make('meta_description')
                                            ->label('Meta Description')
                                            ->rows(3)
                                            ->helperText('Leave empty to use excerpt')
                                            ->columnSpanFull(),
                                        Forms\Components\TagsInput::make('meta_keywords')
                                            ->label('Meta Keywords')
                                            ->helperText('Keywords for SEO (comma-separated)')
                                            ->columnSpan(1),
                                        Forms\Components\TextInput::make('canonical_url')
                                            ->label('Canonical URL')
                                            ->url()
                                            ->maxLength(255)
                                            ->helperText('Leave empty to use default URL')
                                            ->columnSpan(1),
//                                        Forms\Components\Textarea::make('schema_markup')
//                                            ->label('Schema Markup (JSON-LD)')
//                                            ->rows(5)
//                                            ->helperText('JSON-LD structured data for Product/Place schema (optional)')
//                                            ->columnSpanFull(),
                                        Forms\Components\Toggle::make('noindex')
                                            ->label('No Index')
                                            ->helperText('Prevent search engines from indexing this apartment')
                                            ->columnSpan(1),
                                        Forms\Components\Toggle::make('nofollow')
                                            ->label('No Follow')
                                            ->helperText('Prevent search engines from following links')
                                            ->columnSpan(1),
                                    ])
                                    ->columns(2)
                                    ->collapsible(),
                                Forms\Components\Section::make('Internal Notes')
                                    ->schema([
                                        Forms\Components\Textarea::make('notes')
                                            ->label('Internal Notes')
                                            ->rows(5)
                                            ->helperText('Internal notes (not visible to public)')
                                            ->columnSpanFull(),
//                                        Forms\Components\TextInput::make('extra')
//                                            ->label('Extra Data')
//                                            ->helperText('Additional data in JSON format (optional)')
//                                            ->columnSpanFull(),
                                    ])
                                    ->collapsible(),
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
                Tables\Columns\TextColumn::make('index')
                    ->label('#')
                    ->getStateUsing(function ($record, $livewire) {
                        $records = $livewire->getTableRecords();
                        $index = $records->search(function ($item) use ($record) {
                            return $item->id === $record->id;
                        });

                        if ($index === false) {
                            return '';
                        }

                        $currentPage = $records->currentPage() ?? 1;
                        $perPage = $records->perPage() ?? 10;

                        return ($currentPage - 1) * $perPage + $index + 1;
                    })
                    ->sortable(false)
                    ->width('60px')
                    ->alignCenter(),
                Tables\Columns\ImageColumn::make('featured_image_url')
                    ->label('Image')
                    ->getStateUsing(function ($record) {
                        return $record->featured_image_url;
                    })
                    ->circular()
                    ->size(50)
                    ->defaultImageUrl(asset('assets/images/Image-not-found.png')),
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable()
                    ->limit(50),
                Tables\Columns\TextColumn::make('heroFilterPropertyType.name')
                    ->label('Property Type')
                    ->badge()
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('heroFilterBed.name')
                    ->label('Bedrooms')
                    ->badge()
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('bathrooms')
                    ->label('Bathrooms')
                    ->numeric()
                    ->sortable(),
//                SpatieTagsColumn::make('tags')
//                    ->label('Categories')
//                    ->type('apartment_categories')
//                    ->limit(2),
                Tables\Columns\TextColumn::make('price_monthly')
                    ->label('Monthly Price')
                    ->formatStateUsing(fn ($state) => $state ? '$' . number_format($state, 0) : 'N/A')
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
                    ->label('Featured'),
//                    ->boolean(),
                Tables\Columns\IconColumn::make('is_published')
                    ->label('Published'),
//                    ->boolean(),
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
                Tables\Filters\SelectFilter::make('hero_filter_property_type_id')
                    ->label('Property Type')
                    ->relationship('heroFilterPropertyType', 'name')
                    ->multiple(),
                Tables\Filters\SelectFilter::make('hero_filter_bed_id')
                    ->label('Bedrooms')
                    ->relationship('heroFilterBed', 'name')
                    ->multiple(),
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
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
                    ->label('Delete')
                    ->icon('heroicon-o-trash')
                    ->color('danger')
                    ->requiresConfirmation(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Section::make('Overview')
                    ->icon('heroicon-o-information-circle')
                    ->schema([
                        ImageEntry::make('featured_image_url')
                            ->label('Featured Image')
                            ->getStateUsing(fn ($record) => $record->featured_image_url)
                            ->height(300)
                            ->columnSpanFull(),
                        TextEntry::make('title')
                            ->label('Title')
                            ->size(TextEntrySize::Large)
                            ->weight('bold')
                            ->icon('heroicon-o-home')
                            ->columnSpan(2),
                        TextEntry::make('slug')
                            ->label('Slug')
                            ->icon('heroicon-o-link')
                            ->copyable()
                            ->columnSpan(1),
                        TextEntry::make('excerpt')
                            ->label('Excerpt')
                            ->icon('heroicon-o-document-text')
                            ->columnSpanFull(),
                        TextEntry::make('description')
                            ->label('Description')
                            ->html()
                            ->columnSpanFull(),
                    ])
                    ->columns(3),

                Section::make('Property Details')
                    ->icon('heroicon-o-home')
                    ->schema([
                        TextEntry::make('heroFilterPropertyType.name')
                            ->label('Property Type')
                            ->badge()
                            ->color('primary')
                            ->icon('heroicon-o-building-office')
                            ->columnSpan(1),
                        TextEntry::make('heroFilterBed.name')
                            ->label('Bedrooms')
                            ->badge()
                            ->color('info')
                            ->icon('heroicon-o-home-modern')
                            ->columnSpan(1),
                        TextEntry::make('bathrooms')
                            ->label('Bathrooms')
                            ->badge()
                            ->color('success')
                            ->icon('heroicon-o-sparkles')
                            ->formatStateUsing(fn ($state) => $state ? $state . ' ' . ($state > 1 ? 'bathrooms' : 'bathroom') : 'N/A')
                            ->columnSpan(1),
                        TextEntry::make('area')
                            ->label('Area')
                            ->badge()
                            ->color('warning')
                            ->icon('heroicon-o-square-3-stack-3d')
                            ->formatStateUsing(fn ($state) => $state ? number_format($state, 0) . ' m²' : 'N/A')
                            ->columnSpan(1),
                        TextEntry::make('floor')
                            ->label('Floor')
                            ->icon('heroicon-o-arrow-up')
                            ->formatStateUsing(fn ($state) => $state ? 'Floor ' . $state : 'N/A')
                            ->columnSpan(1),
                        TextEntry::make('total_floors')
                            ->label('Total Floors')
                            ->icon('heroicon-o-building-office-2')
                            ->formatStateUsing(fn ($state) => $state ? $state . ' floors' : 'N/A')
                            ->columnSpan(1),
                    ])
                    ->columns(3),

                Section::make('Location')
                    ->icon('heroicon-o-map-pin')
                    ->schema([
                        TextEntry::make('ward.name')
                            ->label('Ward')
                            ->icon('heroicon-o-map')
                            ->badge()
                            ->color('info')
                            ->columnSpan(1),
                        TextEntry::make('address')
                            ->label('Full Address')
                            ->icon('heroicon-o-home')
                            ->copyable()
                            ->columnSpan(2),
                        TextEntry::make('google_maps_embed')
                            ->label('Google Maps')
                            ->html()
                            ->formatStateUsing(fn ($state) => $state ?: 'Not provided')
                            ->columnSpanFull(),
                    ])
                    ->columns(3),

                Section::make('Pricing')
                    ->icon('heroicon-o-currency-dollar')
                    ->schema([
                        TextEntry::make('price_monthly')
                            ->label('Monthly Price')
                            ->money('USD')
                            ->icon('heroicon-o-calendar')
                            ->size(TextEntrySize::Large)
                            ->weight('bold')
                            ->color('success')
                            ->formatStateUsing(fn ($state) => $state ? '$' . number_format($state, 0) . '/month' : 'N/A')
                            ->columnSpan(1),
                        TextEntry::make('price_daily')
                            ->label('Daily Price')
                            ->money('USD')
                            ->icon('heroicon-o-calendar-days')
                            ->size(TextEntrySize::Large)
                            ->weight('bold')
                            ->color('info')
                            ->formatStateUsing(fn ($state) => $state ? '$' . number_format($state, 0) . '/day' : 'N/A')
                            ->columnSpan(1),
                        TextEntry::make('currency')
                            ->label('Currency')
                            ->badge()
                            ->icon('heroicon-o-banknotes')
                            ->columnSpan(1),
                        TextEntry::make('deposit')
                            ->label('Deposit')
                            ->money('USD')
                            ->icon('heroicon-o-shield-check')
                            ->formatStateUsing(fn ($state) => $state ? '$' . number_format($state, 0) : 'N/A')
                            ->columnSpan(1),
                        TextEntry::make('pricing_notes')
                            ->label('Pricing Notes')
                            ->icon('heroicon-o-information-circle')
                            ->placeholder('No notes')
                            ->columnSpanFull(),
                    ])
                    ->columns(2),

                Section::make('Amenities & Features')
                    ->icon('heroicon-o-sparkles')
                    ->schema([
                        TextEntry::make('amenities')
                            ->label('Amenities')
                            ->badge()
                            ->separator(',')
                            ->formatStateUsing(function ($state) {
                                if (empty($state) || !is_array($state)) {
                                    return 'No amenities selected';
                                }
                                $amenities = config('amenities.list', []);
                                $labels = [];
                                foreach ($state as $key) {
                                    if (isset($amenities[$key])) {
                                        $labels[] = $amenities[$key]['label'] ?? $key;
                                    }
                                }
                                return !empty($labels) ? implode(', ', $labels) : 'No amenities selected';
                            })
                            ->columnSpan(1),
                        TextEntry::make('features')
                            ->label('Features')
                            ->badge()
                            ->separator(',')
                            ->formatStateUsing(fn ($state) => is_array($state) && !empty($state) ? implode(', ', $state) : 'No features')
                            ->columnSpan(1),
                    ])
                    ->columns(2)
                    ->collapsible(),

                Section::make('Policies')
                    ->icon('heroicon-o-document-check')
                    ->schema([
                        TextEntry::make('booking_policy')
                            ->label('Booking & Cancellation Policy')
                            ->icon('heroicon-o-calendar')
                            ->placeholder('Not set')
                            ->columnSpanFull(),
                        TextEntry::make('checkin_checkout_policy')
                            ->label('Check-in/Check-out Policy')
                            ->icon('heroicon-o-clock')
                            ->placeholder('Not set')
                            ->columnSpanFull(),
                        TextEntry::make('rules_policy')
                            ->label('Rules & Regulations')
                            ->icon('heroicon-o-document-text')
                            ->placeholder('Not set')
                            ->columnSpanFull(),
                        TextEntry::make('cancellation_policy')
                            ->label('Cancellation Policy')
                            ->icon('heroicon-o-x-circle')
                            ->placeholder('Not set')
                            ->columnSpanFull(),
                    ])
                    ->collapsible(),

                Section::make('Nearby Attractions')
                    ->icon('heroicon-o-map')
                    ->schema([
                        RepeatableEntry::make('nearby_attractions')
                            ->label('')
                            ->schema([
                                TextEntry::make('name')
                                    ->label('Name')
                                    ->icon('heroicon-o-map-pin'),
                                TextEntry::make('distance')
                                    ->label('Distance')
                                    ->icon('heroicon-o-arrow-path'),
                            ])
                            ->columns(2),
                    ])
                    ->collapsible()
                    ->visible(fn ($record) => !empty($record->nearby_attractions)),

                Section::make('Status & Publication')
                    ->icon('heroicon-o-cog-6-tooth')
                    ->schema([
                        TextEntry::make('status')
                            ->label('Status')
                            ->badge()
                            ->formatStateUsing(fn ($state) => match($state) {
                                'available' => 'Available',
                                'rented' => 'Rented',
                                'maintenance' => 'Maintenance',
                                'sold' => 'Sold',
                                default => ucfirst($state ?? 'Unknown'),
                            })
                            ->color(fn ($state) => match($state) {
                                'available' => 'success',
                                'rented' => 'danger',
                                'maintenance' => 'warning',
                                'sold' => 'gray',
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
                        TextEntry::make('published_at')
                            ->label('Published At')
                            ->dateTime('F d, Y \a\t g:i A')
                            ->icon('heroicon-o-calendar')
                            ->placeholder('Not published')
                            ->columnSpan(1),
                        TextEntry::make('available_from')
                            ->label('Available From')
                            ->dateTime('F d, Y \a\t g:i A')
                            ->icon('heroicon-o-clock')
                            ->placeholder('Not set')
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
            'index' => Pages\ListApartments::route('/'),
            'create' => Pages\CreateApartment::route('/create'),
            'view' => Pages\ViewApartment::route('/{record}'),
            'edit' => Pages\EditApartment::route('/{record}/edit'),
        ];
    }

    /**
     * Extract media ID from CuratorPicker value
     * CuratorPicker can return: ID (int), object with 'id' key, or array with UUID keys
     *
     * @param mixed $value
     * @return int|null
     */
    public static function extractMediaIdFromValue($value): ?int
    {
        if (is_numeric($value)) {
            return (int)$value;
        }

        if (is_array($value)) {
            // If it's an array with UUID keys (Curator format: {"uuid": {"id": 11, ...}})
            foreach ($value as $key => $item) {
                if (is_array($item) && isset($item['id'])) {
                    return (int)$item['id'];
                }
            }
            // If it's a simple array with 'id' key
            if (isset($value['id'])) {
                return (int)$value['id'];
            }
        }

        if (is_object($value)) {
            if (isset($value->id)) {
                return (int)$value->id;
            }
        }

        return null;
    }

    /**
     * Extract latitude and longitude from Google Maps embed iframe
     *
     * @param string $embedCode
     * @return array|null
     */
    protected static function extractCoordinatesFromEmbed(string $embedCode): ?array
    {
        if (preg_match('/src=["\']([^"\']+)["\']/', $embedCode, $matches)) {
            $url = urldecode($matches[1]);

            $latitude = null;
            $longitude = null;

            if (preg_match('/!3d([0-9.-]+)/', $url, $latMatches)) {
                $latitude = (float)$latMatches[1];
            }

            if (preg_match('/!2d([0-9.-]+)/', $url, $lngMatches)) {
                $longitude = (float)$lngMatches[1];
            }

            if ($latitude !== null && $longitude !== null) {
                return [
                    'lat' => $latitude,
                    'lng' => $longitude,
                ];
            }

            if (preg_match('/[?&]ll=([^&]+)/', $url, $llMatches)) {
                $coords = explode(',', urldecode($llMatches[1]));
                if (count($coords) >= 2) {
                    return [
                        'lat' => (float)trim($coords[0]),
                        'lng' => (float)trim($coords[1]),
                    ];
                }
            }

            if (preg_match('/[?&]center=([^&]+)/', $url, $centerMatches)) {
                $coords = explode(',', urldecode($centerMatches[1]));
                if (count($coords) >= 2) {
                    return [
                        'lat' => (float)trim($coords[0]),
                        'lng' => (float)trim($coords[1]),
                    ];
                }
            }
        }

        return null;
    }
}
