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
use Awcodes\Curator\Components\Forms\CuratorPicker;
use Illuminate\Support\Facades\Auth;

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
                                Forms\Components\Select::make('property_type')
                                    ->label('Property Type (Legacy)')
                                    ->options([
                                        'apartment' => 'Apartment',
                                        'villa' => 'Villa',
                                        'studio' => 'Studio',
                                        'condo' => 'Condo',
                                    ])
                                    ->default('apartment')
                                    ->columnSpan(1),
                                Forms\Components\Select::make('hero_filter_property_type_id')
                                    ->label('Property Type')
                                    ->relationship('heroFilterPropertyType', 'name')
                                    ->searchable()
                                    ->preload()
                                    ->helperText('Select from configured property types')
                                    ->columnSpan(1),
                            ])
                            ->columns(2),

                        Forms\Components\Tabs\Tab::make('Property Details')
                            ->icon('heroicon-o-home')
                            ->schema([
                                Forms\Components\TextInput::make('bedrooms')
                                    ->label('Bedrooms (Number)')
                                    ->numeric()
                                    ->default(1)
                                    ->helperText('Number of bedrooms')
                                    ->columnSpan(1),
                                Forms\Components\Select::make('hero_filter_bed_id')
                                    ->label('Bed Filter Option')
                                    ->relationship('heroFilterBed', 'name')
                                    ->searchable()
                                    ->preload()
                                    ->helperText('Select bed option for filtering (e.g., 1 Bed, 2 Beds)')
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
                            ->columns(3),

                        Forms\Components\Tabs\Tab::make('Location')
                            ->icon('heroicon-o-map-pin')
                            ->schema([
                                Forms\Components\TextInput::make('location')
                                    ->label('Location (Legacy)')
                                    ->maxLength(255)
                                    ->helperText('General location text (e.g., Sunset Town)')
                                    ->columnSpan(1),
                                Forms\Components\Select::make('hero_filter_location_id')
                                    ->label('Location Filter')
                                    ->relationship('heroFilterLocation', 'name')
                                    ->searchable()
                                    ->preload()
                                    ->helperText('Select location for filtering')
                                    ->columnSpan(1),
                                Forms\Components\TextInput::make('district')
                                    ->label('District')
                                    ->maxLength(255)
                                    ->helperText('District name (e.g., An Thoi, Duong Dong)')
                                    ->columnSpan(2),
                                Forms\Components\TextInput::make('address')
                                    ->label('Full Address')
                                    ->maxLength(255)
                                    ->helperText('Complete address of the property')
                                    ->columnSpanFull(),
                                Forms\Components\Textarea::make('google_maps_embed')
                                    ->label('Google Maps Embed')
                                    ->rows(3)
                                    ->helperText('Paste Google Maps embed iframe code here. Coordinates will be extracted automatically.')
                                    ->placeholder('<iframe src="https://www.google.com/maps/embed?pb=..." width="600" height="450" style="border:0;"></iframe>')
                                    ->dehydrated() // Save this field to database
                                    ->afterStateUpdated(function ($state, Forms\Set $set) {
                                        if ($state) {
                                            // Extract coordinates from Google Maps embed iframe
                                            $coordinates = self::extractCoordinatesFromEmbed($state);
                                            if ($coordinates) {
                                                $set('latitude', $coordinates['lat']);
                                                $set('longitude', $coordinates['lng']);
                                            }
                                        }
                                    })
                                    ->columnSpanFull(),
                                Forms\Components\TextInput::make('latitude')
                                    ->label('Latitude')
                                    ->numeric()
                                    ->disabled()
                                    ->dehydrated()
                                    ->helperText('GPS latitude coordinate (auto-filled from Google Maps embed)')
                                    ->columnSpan(1),
                                Forms\Components\TextInput::make('longitude')
                                    ->label('Longitude')
                                    ->numeric()
                                    ->disabled()
                                    ->dehydrated()
                                    ->helperText('GPS longitude coordinate (auto-filled from Google Maps embed)')
                                    ->columnSpan(1),
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

                        Forms\Components\Tabs\Tab::make('Pricing')
                            ->icon('heroicon-o-currency-dollar')
                            ->schema([
                                Forms\Components\TextInput::make('price_monthly')
                                    ->label('Monthly Price')
                                    ->numeric()
                                    ->prefix('$')
                                    ->helperText('Monthly rental price')
                                    ->columnSpan(1),
                                Forms\Components\TextInput::make('price_daily')
                                    ->label('Daily Price')
                                    ->numeric()
                                    ->prefix('$')
                                    ->helperText('Daily rental price (for short-term)')
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
                                Forms\Components\TextInput::make('deposit')
                                    ->label('Deposit')
                                    ->numeric()
                                    ->prefix('$')
                                    ->helperText('Security deposit amount')
                                    ->columnSpan(1),
                                Forms\Components\Textarea::make('pricing_notes')
                                    ->label('Pricing Notes')
                                    ->rows(3)
                                    ->helperText('Additional notes about pricing (e.g., utilities included/excluded)')
                                    ->columnSpanFull(),
                            ])
                            ->columns(2),

                        Forms\Components\Tabs\Tab::make('Policies')
                            ->icon('heroicon-o-document-check')
                            ->schema([
                                Forms\Components\Textarea::make('booking_policy')
                                    ->label('Đặt phòng và hủy phòng')
                                    ->rows(4)
                                    ->helperText('Policy for booking and cancellation')
                                    ->placeholder('Nên liên hệ trực tiếp qua số hotline hoặc Zalo để xác nhận thông tin về giá cả và tình trạng phòng, đặc biệt vào cuối tuần hoặc mùa du lịch cao điểm.')
                                    ->columnSpanFull(),
                                Forms\Components\Textarea::make('checkin_checkout_policy')
                                    ->label('Nhận/trả phòng')
                                    ->rows(4)
                                    ->helperText('Check-in and check-out policy')
                                    ->placeholder('Chính sách có thể linh hoạt hoặc được thông báo cụ thể khi đặt phòng.')
                                    ->columnSpanFull(),
                                Forms\Components\Textarea::make('rules_policy')
                                    ->label('Các quy định khác')
                                    ->rows(4)
                                    ->helperText('Other rules and regulations')
                                    ->placeholder('Cần tuân thủ các quy định chung của homestay về giữ gìn vệ sinh và trật tự để đảm bảo không gian nghỉ ngơi cho tất cả mọi người.')
                                    ->columnSpanFull(),
                                Forms\Components\Textarea::make('cancellation_policy')
                                    ->label('Cancellation Policy (Optional)')
                                    ->rows(4)
                                    ->helperText('Detailed cancellation policy (optional, will use booking_policy if empty)')
                                    ->columnSpanFull(),
                            ]),

                        Forms\Components\Tabs\Tab::make('Tags & Categories')
                            ->icon('heroicon-o-tag')
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
                            ->columns(2),

                        Forms\Components\Tabs\Tab::make('Amenities & Features')
                            ->icon('heroicon-o-sparkles')
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
                            ->columns(2),

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
                                        // Handle array case (CuratorPicker might return array)
                                        if (is_array($imageId)) {
                                            $imageId = $imageId['id'] ?? $imageId[0] ?? null;
                                            if ($imageId === null) {
                                                return 'New Image';
                                            }
                                        }
                                        // Convert to string if it's a number
                                        if (is_numeric($imageId)) {
                                            return "Image ID: {$imageId}";
                                        }
                                        // If it's already a string, return it
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
                                                        $ids[] = (int) $id;
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

                        Forms\Components\Tabs\Tab::make('Status & Settings')
                            ->icon('heroicon-o-cog-6-tooth')
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
                                Forms\Components\Toggle::make('is_featured')
                                    ->label('Featured')
                                    ->helperText('Show this apartment as featured on listings')
                                    ->columnSpan(1),
                                Forms\Components\Toggle::make('is_published')
                                    ->label('Published')
                                    ->default(true)
                                    ->helperText('Make this apartment visible on the website')
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
                            ])
                            ->columns(2),

                        Forms\Components\Tabs\Tab::make('SEO Settings')
                            ->icon('heroicon-o-magnifying-glass')
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
                                Forms\Components\Textarea::make('schema_markup')
                                    ->label('Schema Markup (JSON-LD)')
                                    ->rows(5)
                                    ->helperText('JSON-LD structured data for Product/Place schema (optional)')
                                    ->columnSpanFull(),
                                Forms\Components\Toggle::make('noindex')
                                    ->label('No Index')
                                    ->helperText('Prevent search engines from indexing this apartment')
                                    ->columnSpan(1),
                                Forms\Components\Toggle::make('nofollow')
                                    ->label('No Follow')
                                    ->helperText('Prevent search engines from following links')
                                    ->columnSpan(1),
                            ])
                            ->columns(2),

                        Forms\Components\Tabs\Tab::make('Notes')
                            ->icon('heroicon-o-document-text')
                            ->schema([
                                Forms\Components\Textarea::make('notes')
                                    ->label('Internal Notes')
                                    ->rows(5)
                                    ->helperText('Internal notes (not visible to public)')
                                    ->columnSpanFull(),
                                Forms\Components\TextInput::make('extra')
                                    ->label('Extra Data')
                                    ->helperText('Additional data in JSON format (optional)')
                                    ->columnSpanFull(),
                            ]),
                    ])
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('index')
                    ->label('#')
                    ->getStateUsing(function ($record, $livewire) {
                        // Get the table records collection
                        $records = $livewire->getTableRecords();

                        // Find the index of current record in the collection
                        $index = $records->search(function ($item) use ($record) {
                            return $item->id === $record->id;
                        });

                        if ($index === false) {
                            return '';
                        }

                        // Get pagination info
                        $currentPage = $records->currentPage() ?? 1;
                        $perPage = $records->perPage() ?? 10;

                        // Calculate sequential number: (page - 1) * perPage + index + 1
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
                Tables\Columns\TextColumn::make('property_type')
                    ->label('Type (Legacy)')
                    ->badge()
                    ->searchable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('heroFilterPropertyType.name')
                    ->label('Property Type')
                    ->badge()
                    ->sortable(),
                Tables\Columns\TextColumn::make('bedrooms')
                    ->label('BR')
                    ->numeric()
                    ->sortable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('heroFilterBed.name')
                    ->label('Bed Filter')
                    ->badge()
                    ->sortable(),
                Tables\Columns\TextColumn::make('bathrooms')
                    ->label('BA')
                    ->numeric()
                    ->sortable(),
                SpatieTagsColumn::make('tags')
                    ->label('Categories')
                    ->type('apartment_categories')
                    ->limit(2),
                Tables\Columns\TextColumn::make('district')
                    ->label('District')
                    ->searchable(),
                Tables\Columns\TextColumn::make('heroFilterLocation.name')
                    ->label('Location Filter')
                    ->badge()
                    ->sortable(),
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
                Tables\Filters\SelectFilter::make('hero_filter_location_id')
                    ->label('Location')
                    ->relationship('heroFilterLocation', 'name')
                    ->multiple(),
                Tables\Filters\SelectFilter::make('hero_filter_property_type_id')
                    ->label('Property Type')
                    ->relationship('heroFilterPropertyType', 'name')
                    ->multiple(),
                Tables\Filters\SelectFilter::make('hero_filter_bed_id')
                    ->label('Bed Filter')
                    ->relationship('heroFilterBed', 'name')
                    ->multiple(),
                Tables\Filters\SelectFilter::make('property_type')
                    ->label('Property Type (Legacy)')
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
            return (int) $value;
        }

        if (is_array($value)) {
            // If it's an array with UUID keys (Curator format: {"uuid": {"id": 11, ...}})
            foreach ($value as $key => $item) {
                if (is_array($item) && isset($item['id'])) {
                    return (int) $item['id'];
                }
            }
            // If it's a simple array with 'id' key
            if (isset($value['id'])) {
                return (int) $value['id'];
            }
        }

        if (is_object($value)) {
            if (isset($value->id)) {
                return (int) $value->id;
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

            // Extract latitude from !3d parameter
            if (preg_match('/!3d([0-9.-]+)/', $url, $latMatches)) {
                $latitude = (float) $latMatches[1];
            }

            // Extract longitude from !2d parameter
            if (preg_match('/!2d([0-9.-]+)/', $url, $lngMatches)) {
                $longitude = (float) $lngMatches[1];
            }

            if ($latitude !== null && $longitude !== null) {
                return [
                    'lat' => $latitude,
                    'lng' => $longitude,
                ];
            }

            // Fallback: Try to extract from ll parameter (if present)
            if (preg_match('/[?&]ll=([^&]+)/', $url, $llMatches)) {
                $coords = explode(',', urldecode($llMatches[1]));
                if (count($coords) >= 2) {
                    return [
                        'lat' => (float) trim($coords[0]),
                        'lng' => (float) trim($coords[1]),
                    ];
                }
            }

            // Fallback: Try to extract from center parameter
            if (preg_match('/[?&]center=([^&]+)/', $url, $centerMatches)) {
                $coords = explode(',', urldecode($centerMatches[1]));
                if (count($coords) >= 2) {
                    return [
                        'lat' => (float) trim($coords[0]),
                        'lng' => (float) trim($coords[1]),
                    ];
                }
            }
        }

        return null;
    }
}
