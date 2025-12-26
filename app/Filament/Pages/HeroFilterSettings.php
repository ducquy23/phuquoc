<?php

namespace App\Filament\Pages;

use App\Models\Option;
use Filament\Forms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Awcodes\Curator\Components\Forms\CuratorPicker;

class HeroFilterSettings extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-adjustments-horizontal';
    protected static string $view = 'filament.pages.hero-filter-settings';
    protected static ?string $navigationLabel = 'Hero Filter Settings';
    protected static ?string $title = 'Hero Filter Settings';
    protected static ?string $navigationGroup = 'Site Settings';
    protected static ?int $navigationSort = 12;

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill([
            'hero_filter_locations' => Option::get('hero_filter_locations', json_encode([
                'All Main Locations',
                'Sunset Town',
                'An Thoi',
                'Duong Dong',
                'Duong To',
            ])),
            'hero_filter_property_types' => Option::get('hero_filter_property_types', json_encode([
                'All Types',
                'Studio',
                '1 Bedroom',
                '2 Bedrooms',
                'Apartment',
                'Bungalow',
                'House',
                'Shop House',
                'Villa',
            ])),
            'hero_filter_beds' => Option::get('hero_filter_beds', json_encode([
                'All Beds',
                '1 Bed',
                '2 Beds',
                '3 Beds',
                '4 Beds',
                '5+ Beds',
            ])),
            'hero_featured_apartment_title' => Option::get('hero_featured_apartment_title', '18th Floor Sunset Town Phu Quoc | One Bedroom'),
            'hero_featured_apartment_description' => Option::get('hero_featured_apartment_description', 'Sea + Firework View'),
            'hero_featured_apartment_beds' => Option::get('hero_featured_apartment_beds', '1 Bed'),
            'hero_featured_apartment_area' => Option::get('hero_featured_apartment_area', '50 m²'),
            'hero_featured_apartment_price' => Option::get('hero_featured_apartment_price', '$732'),
            'hero_featured_apartment_image' => Option::get('hero_featured_apartment_image', ''),
        ]);
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Filter Options')
                    ->description('Configure the filter dropdown options for the hero section search form.')
                    ->schema([
                        Forms\Components\Textarea::make('hero_filter_locations')
                            ->label('Locations (JSON Array)')
                            ->helperText('Enter locations as a JSON array, one per line. Example: ["All Main Locations", "Sunset Town", "An Thoi"]')
                            ->rows(5)
                            ->required(),
                        Forms\Components\Textarea::make('hero_filter_property_types')
                            ->label('Property Types (JSON Array)')
                            ->helperText('Enter property types as a JSON array, one per line. Example: ["All Types", "Studio", "Apartment"]')
                            ->rows(5)
                            ->required(),
                        Forms\Components\Textarea::make('hero_filter_beds')
                            ->label('Bed Options (JSON Array)')
                            ->helperText('Enter bed options as a JSON array, one per line. Example: ["All Beds", "1 Bed", "2 Beds"]')
                            ->rows(5)
                            ->required(),
                    ]),
                Forms\Components\Section::make('Featured Apartment Card')
                    ->description('Configure the featured apartment card displayed in the hero section.')
                    ->schema([
                        Forms\Components\TextInput::make('hero_featured_apartment_title')
                            ->label('Title')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('hero_featured_apartment_description')
                            ->label('Description')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('hero_featured_apartment_beds')
                            ->label('Beds')
                            ->maxLength(50),
                        Forms\Components\TextInput::make('hero_featured_apartment_area')
                            ->label('Area')
                            ->maxLength(50),
                        Forms\Components\TextInput::make('hero_featured_apartment_price')
                            ->label('Price')
                            ->maxLength(50),
                        CuratorPicker::make('hero_featured_apartment_image')
                            ->label('Featured Image')
                            ->helperText('Select an image from Curator or enter a direct URL'),
                    ]),
            ])
            ->statePath('data');
    }

    public function save(): void
    {
        $data = $this->form->getState();

        // Validate JSON arrays
        foreach (['hero_filter_locations', 'hero_filter_property_types', 'hero_filter_beds'] as $key) {
            if (isset($data[$key])) {
                $decoded = json_decode($data[$key], true);
                if (json_last_error() !== JSON_ERROR_NONE) {
                    // If not valid JSON, try to convert from newline-separated list
                    $lines = array_filter(array_map('trim', explode("\n", $data[$key])));
                    $data[$key] = json_encode($lines);
                } else {
                    $data[$key] = json_encode($decoded);
                }
            }
        }

        foreach ($data as $key => $value) {
            Option::set($key, $value);
        }

        Notification::make()
            ->title('Settings saved successfully!')
            ->success()
            ->send();
    }

    protected function getFormActions(): array
    {
        return [
            Forms\Components\Actions\Action::make('save')
                ->label('Save Settings')
                ->submit('save'),
        ];
    }

    public function getCachedFormActions(): array
    {
        return $this->getFormActions();
    }

    public function hasFullWidthFormActions(): bool
    {
        return false;
    }
}

