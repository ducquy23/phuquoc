<?php

namespace App\Filament\Pages;

use App\Models\Option;
use Filament\Forms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;

class HomeSettings extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-home';
    protected static string $view = 'filament.pages.home-settings';
    protected static ?string $navigationGroup = 'Site Settings';
    protected static ?int $navigationSort = 10;
    protected static ?string $title = 'Home Page Settings';
    protected static ?string $navigationLabel = 'Home Settings';

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill([
            'home_about_avatar' => Option::get('home_about_avatar', ''),
            'home_about_heading' => Option::get('home_about_heading', 'About Me'),
            'home_about_intro' => Option::get('home_about_intro', ''),
            'home_about_details' => Option::get('home_about_details', ''),
            'home_testimonials' => json_decode(Option::get('home_testimonials', '[]'), true) ?: [],
            'home_gallery_images' => json_decode(Option::get('home_gallery_images', '[]'), true) ?: [],
        ]);
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('About Section')
                    ->icon('heroicon-o-user-circle')
                    ->description('Thông tin giới thiệu hiển thị trên trang home')
                    ->schema([
                        Forms\Components\FileUpload::make('home_about_avatar')
                            ->label('Avatar Photo')
                            ->helperText('Ảnh đại diện hiển thị trên trang home (nếu không chọn sẽ dùng avatar từ Contact Settings)')
                            ->image()
                            ->imageEditor()
                            ->imageEditorAspectRatios([
                                null,
                                '1:1',
                            ])
                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp', 'image/gif'])
                            ->directory('home/about')
                            ->visibility('public')
                            ->maxSize(2048)
                            ->disk('public')
                            ->columnSpanFull(),
                        Forms\Components\TextInput::make('home_about_heading')
                            ->label('About Heading')
                            ->default('About Me')
                            ->maxLength(255)
                            ->columnSpanFull(),
                        Forms\Components\Textarea::make('home_about_intro')
                            ->label('Introduction Paragraph 1')
                            ->rows(3)
                            ->placeholder('First paragraph of introduction...')
                            ->columnSpanFull(),
                        Forms\Components\Textarea::make('home_about_details')
                            ->label('Introduction Paragraph 2')
                            ->rows(3)
                            ->placeholder('Second paragraph with more details...')
                            ->columnSpanFull(),
                    ]),

                Forms\Components\Section::make('Testimonials')
                    ->icon('heroicon-o-chat-bubble-left-right')
                    ->description('Customer testimonials hiển thị trên trang home')
                    ->schema([
                        Forms\Components\Repeater::make('home_testimonials')
                            ->label('Testimonials')
                            ->schema([
                                Forms\Components\Textarea::make('content')
                                    ->label('Testimonial Content')
                                    ->required()
                                    ->rows(3)
                                    ->columnSpanFull(),
                                Forms\Components\TextInput::make('name')
                                    ->label('Customer Name')
                                    ->required()
                                    ->maxLength(255)
                                    ->columnSpan(1),
                                Forms\Components\TextInput::make('role')
                                    ->label('Role/Type')
                                    ->placeholder('Long-term tenant, Holiday guest, Remote worker...')
                                    ->maxLength(255)
                                    ->columnSpan(1),
                                Forms\Components\FileUpload::make('avatar')
                                    ->label('Avatar')
                                    ->image()
                                    ->imageEditor()
                                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp', 'image/gif'])
                                    ->directory('home/testimonials')
                                    ->visibility('public')
                                    ->maxSize(1024)
                                    ->disk('public')
                                    ->columnSpanFull(),
                            ])
                            ->columns(2)
                            ->defaultItems(0)
                            ->collapsible()
                            ->itemLabel(fn (array $state): ?string => $state['name'] ?? 'New Testimonial'),
                    ]),

                Forms\Components\Section::make('Gallery Images')
                    ->icon('heroicon-o-photo')
                    ->description('Ảnh hiển thị trong slider gallery trên trang home')
                    ->schema([
                        Forms\Components\Repeater::make('home_gallery_images')
                            ->label('Gallery Images')
                            ->schema([
                                Forms\Components\FileUpload::make('image')
                                    ->label('Image')
                                    ->image()
                                    ->imageEditor()
                                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp', 'image/gif'])
                                    ->directory('home/gallery')
                                    ->visibility('public')
                                    ->maxSize(2048)
                                    ->disk('public')
                                    ->required()
                                    ->columnSpan(1),
                                Forms\Components\TextInput::make('alt')
                                    ->label('Alt Text')
                                    ->maxLength(255)
                                    ->placeholder('Guest photo...')
                                    ->columnSpan(1),
                            ])
                            ->columns(2)
                            ->defaultItems(0)
                            ->collapsible()
                            ->itemLabel(fn (array $state): ?string => $state['alt'] ?? 'Gallery Image'),
                    ]),
            ])
            ->statePath('data');
    }

    public function save(): void
    {
        $data = $this->form->getState();

        $options = [
            'home_about_avatar' => $data['home_about_avatar'] ?? '',
            'home_about_heading' => $data['home_about_heading'] ?? 'About Me',
            'home_about_intro' => $data['home_about_intro'] ?? '',
            'home_about_details' => $data['home_about_details'] ?? '',
            'home_testimonials' => json_encode($data['home_testimonials'] ?? []),
            'home_gallery_images' => json_encode($data['home_gallery_images'] ?? []),
        ];

        foreach ($options as $key => $value) {
            Option::set($key, $value);
        }

        Notification::make()
            ->title('Home settings saved successfully!')
            ->success()
            ->send();
    }

    protected function getFormActions(): array
    {
        return [
            Forms\Components\Actions\Action::make('save')
                ->label('Save Settings')
                ->submit('save')
                ->keyBindings(['mod+s'])
                ->color('primary'),
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

