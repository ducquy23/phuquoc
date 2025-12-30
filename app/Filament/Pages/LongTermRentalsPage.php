<?php

namespace App\Filament\Pages;

use App\Models\Apartment;
use App\Models\SeoPage;
use Filament\Forms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Pages\Page;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Illuminate\Contracts\View\View;

class LongTermRentalsPage extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationGroup = 'SEO Pages';
    protected static ?int $navigationSort = 1;
    protected static ?string $title = 'Long-Term Rentals Page';
    protected static ?string $navigationLabel = 'Long-Term Rentals';

    protected static string $view = 'filament.pages.long-term-rentals';

    public ?array $data = [];

    public function mount(): void
    {
        $page = SeoPage::getOrCreateBySlug('long-term-rentals');
        $this->form->fill($page->toArray());
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('SEO Meta Tags')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('Page Title')
                            ->maxLength(255),
                        Forms\Components\Textarea::make('meta_description')
                            ->label('Meta Description')
                            ->rows(3)
                            ->maxLength(500),
                        Forms\Components\TextInput::make('meta_keywords')
                            ->label('Meta Keywords')
                            ->maxLength(255),
                    ])
                    ->columns(1),

                Forms\Components\Section::make('Hero Section')
                    ->schema([
                        Forms\Components\TextInput::make('hero_title')
                            ->label('Hero Title')
                            ->maxLength(255),
                        Forms\Components\Textarea::make('hero_subtitle')
                            ->label('Hero Subtitle')
                            ->rows(2)
                            ->maxLength(500),
                        Forms\Components\TextInput::make('hero_badge_text')
                            ->label('Hero Badge Text')
                            ->maxLength(100),
                        Forms\Components\TextInput::make('hero_background_image_url')
                            ->label('Hero Background Image URL')
                            ->url()
                            ->maxLength(500),
                        Forms\Components\TextInput::make('hero_cta_primary_text')
                            ->label('Primary CTA Text')
                            ->maxLength(100),
                        Forms\Components\TextInput::make('hero_cta_primary_link')
                            ->label('Primary CTA Link')
                            ->url()
                            ->maxLength(500),
                        Forms\Components\TextInput::make('hero_cta_secondary_text')
                            ->label('Secondary CTA Text')
                            ->maxLength(100),
                        Forms\Components\TextInput::make('hero_cta_secondary_link')
                            ->label('Secondary CTA Link')
                            ->url()
                            ->maxLength(500),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Content Sections')
                    ->schema([
                        Forms\Components\Repeater::make('content_sections')
                            ->schema([
                                Forms\Components\TextInput::make('title')
                                    ->label('Section Title')
                                    ->required(),
                                Forms\Components\Textarea::make('content')
                                    ->label('Content')
                                    ->rows(4),
                            ])
                            ->defaultItems(0)
                            ->collapsible(),
                    ]),

                Forms\Components\Section::make('Features')
                    ->schema([
                        Forms\Components\Repeater::make('features')
                            ->schema([
                                Forms\Components\TextInput::make('title')
                                    ->label('Feature Title')
                                    ->required(),
                                Forms\Components\Textarea::make('description')
                                    ->label('Description')
                                    ->rows(2),
                                Forms\Components\TextInput::make('icon')
                                    ->label('Icon (Material Symbol name)')
                                    ->maxLength(100),
                            ])
                            ->defaultItems(0)
                            ->collapsible(),
                    ]),

                Forms\Components\Section::make('FAQs')
                    ->schema([
                        Forms\Components\Repeater::make('faqs')
                            ->schema([
                                Forms\Components\TextInput::make('question')
                                    ->label('Question')
                                    ->required(),
                                Forms\Components\Textarea::make('answer')
                                    ->label('Answer')
                                    ->rows(3)
                                    ->required(),
                            ])
                            ->defaultItems(0)
                            ->collapsible(),
                    ]),

                Forms\Components\Section::make('Map Section')
                    ->schema([
                        Forms\Components\Textarea::make('map_embed_url')
                            ->label('Google Maps Embed URL')
                            ->helperText('Dán URL embed từ Google Maps (phần src trong iframe), ví dụ: https://www.google.com/maps/embed?...')
                            ->rows(2),
                    ]),

                Forms\Components\Section::make('Sidebar Search & Contact')
                    ->schema([
                        Forms\Components\Toggle::make('show_sidebar_search')
                            ->label('Show Search Widget')
                            ->default(true)
                            ->helperText('Bật / tắt khối form tìm kiếm bên sidebar'),

                        Forms\Components\Toggle::make('show_sidebar_agent')
                            ->label('Show Agent Contact Card')
                            ->default(true)
                            ->helperText('Bật / tắt khối thông tin agent'),

                        Forms\Components\Toggle::make('show_sidebar_related')
                            ->label('Show Related Motorbikes')
                            ->default(true)
                            ->helperText('Bật / tắt khối "You might also like" (motorbikes)'),

                        Forms\Components\Fieldset::make('Search Widget')
                            ->schema([
                                Forms\Components\TextInput::make('sidebar_search_title')
                                    ->label('Search Box Title')
                                    ->maxLength(255),
                                Forms\Components\Textarea::make('sidebar_search_description')
                                    ->label('Search Description')
                                    ->rows(2),
                                Forms\Components\TextInput::make('sidebar_search_button_text')
                                    ->label('Search Button Text')
                                    ->maxLength(100),
                            ])
                            ->columns(1),
                    ]),
            ])
            ->statePath('data');
    }

    public function save(): void
    {
        $data = $this->form->getState();
        $data['slug'] = 'long-term-rentals';

        $page = SeoPage::updateOrCreate(
            ['slug' => 'long-term-rentals'],
            $data
        );

        $this->form->fill($page->toArray());

        Notification::make()
            ->title('Saved successfully')
            ->success()
            ->send();
    }

    protected function getFormActions(): array
    {
        return [
            Forms\Components\Actions\Action::make('save')
                ->label('Save Changes')
                ->submit('save')
                ->color('primary'),
        ];
    }

    public function getFeaturedApartments()
    {
        return Apartment::where('is_featured', true)
            ->where('is_published', true)
            ->where('status', 'available')
            ->orderBy('created_at', 'desc')
            ->limit(6)
            ->get();
    }
}
