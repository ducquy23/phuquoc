<?php

namespace App\Filament\Pages;

use App\Models\Option;
use Filament\Forms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;

class ContactSettings extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-phone';
    protected static string $view = 'filament.pages.contact-settings';
    protected static ?string $navigationGroup = 'Site Settings';
    protected static ?int $navigationSort = 11;
    protected static ?string $title = 'Contact Page Settings';
    protected static ?string $navigationLabel = 'Contact Settings';

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill([
            'agent_name' => Option::get('contact_agent_name', 'Vu Van Hai'),
            'agent_title' => Option::get('contact_agent_title', 'Your friendly neighborhood buddy'),
            'agent_bio' => Option::get('contact_agent_bio', ''),
            'agent_photo' => Option::get('contact_agent_photo', ''),
            'contact_email' => Option::get('contact_email', 'vnha231@gmail.com'),
            'contact_phone' => Option::get('contact_phone', '+84 9024 07024'),
            'contact_location' => Option::get('contact_location', 'Sunset Town, Phu Quoc, Vietnam'),
            'social_twitter' => Option::get('contact_social_twitter', ''),
            'social_facebook' => Option::get('contact_social_facebook', ''),
            'social_instagram' => Option::get('contact_social_instagram', ''),
            'office_hours_weekdays' => Option::get('contact_office_hours_weekdays', '9:00 AM - 6:00 PM'),
            'office_hours_saturday' => Option::get('contact_office_hours_saturday', '9:00 AM - 4:00 PM'),
            'office_hours_sunday' => Option::get('contact_office_hours_sunday', 'Closed'),
        ]);
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Agent Information')
                    ->icon('heroicon-o-user')
                    ->description('Thông tin agent hiển thị trên trang contact')
                    ->schema([
                        Forms\Components\TextInput::make('agent_name')
                            ->label('Agent Name')
                            ->required()
                            ->maxLength(255)
                            ->columnSpan(1),
                        Forms\Components\TextInput::make('agent_title')
                            ->label('Agent Title')
                            ->maxLength(255)
                            ->placeholder('Your friendly neighborhood buddy')
                            ->columnSpan(1),
                        Forms\Components\Textarea::make('agent_bio')
                            ->label('Agent Bio')
                            ->rows(4)
                            ->placeholder('Enter agent bio/description...')
                            ->columnSpanFull(),
                        Forms\Components\FileUpload::make('agent_photo')
                            ->label('Agent Photo')
                            ->helperText('Upload agent photo (JPG, PNG, WebP, GIF)')
                            ->image()
                            ->imageEditor()
                            ->imageEditorAspectRatios([
                                null,
                                '1:1',
                                '4:3',
                                '16:9',
                            ])
                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp', 'image/gif'])
                            ->directory('contact/agent')
                            ->visibility('public')
                            ->maxSize(2048) // 2MB
                            ->disk('public')
                            ->columnSpanFull(),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Contact Information')
                    ->icon('heroicon-o-envelope')
                    ->description('Thông tin liên hệ hiển thị trên trang contact')
                    ->schema([
                        Forms\Components\TextInput::make('contact_email')
                            ->label('Email Address')
                            ->email()
                            ->required()
                            ->maxLength(255)
                            ->columnSpan(1),
                        Forms\Components\TextInput::make('contact_phone')
                            ->label('Phone Number')
                            ->tel()
                            ->required()
                            ->maxLength(255)
                            ->columnSpan(1),
                        Forms\Components\TextInput::make('contact_location')
                            ->label('Location')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Sunset Town, Phu Quoc, Vietnam')
                            ->columnSpanFull(),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Social Media Links')
                    ->icon('heroicon-o-share')
                    ->description('Links mạng xã hội (để trống nếu không muốn hiển thị)')
                    ->schema([
                        Forms\Components\TextInput::make('social_twitter')
                            ->label('Twitter URL')
                            ->url()
                            ->maxLength(255)
                            ->placeholder('https://twitter.com/username')
                            ->columnSpan(1),
                        Forms\Components\TextInput::make('social_facebook')
                            ->label('Facebook URL')
                            ->url()
                            ->maxLength(255)
                            ->placeholder('https://facebook.com/username')
                            ->columnSpan(1),
                        Forms\Components\TextInput::make('social_instagram')
                            ->label('Instagram URL')
                            ->url()
                            ->maxLength(255)
                            ->placeholder('https://instagram.com/username')
                            ->columnSpan(1),
                    ])
                    ->columns(3),

                Forms\Components\Section::make('Office Hours')
                    ->icon('heroicon-o-clock')
                    ->description('Giờ làm việc hiển thị trên trang contact')
                    ->schema([
                        Forms\Components\TextInput::make('office_hours_weekdays')
                            ->label('Monday - Friday')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('9:00 AM - 6:00 PM')
                            ->columnSpan(1),
                        Forms\Components\TextInput::make('office_hours_saturday')
                            ->label('Saturday')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('9:00 AM - 4:00 PM')
                            ->columnSpan(1),
                        Forms\Components\TextInput::make('office_hours_sunday')
                            ->label('Sunday')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Closed')
                            ->columnSpan(1),
                    ])
                    ->columns(3),
            ])
            ->statePath('data');
    }

    public function save(): void
    {
        $data = $this->form->getState();

        // Handle agent_photo: FileUpload returns file path/URL
        $agentPhoto = $data['agent_photo'] ?? '';

        $options = [
            'contact_agent_name' => $data['agent_name'] ?? '',
            'contact_agent_title' => $data['agent_title'] ?? '',
            'contact_agent_bio' => $data['agent_bio'] ?? '',
            'contact_agent_photo' => $agentPhoto,
            'contact_email' => $data['contact_email'] ?? '',
            'contact_phone' => $data['contact_phone'] ?? '',
            'contact_location' => $data['contact_location'] ?? '',
            'contact_social_twitter' => $data['social_twitter'] ?? '',
            'contact_social_facebook' => $data['social_facebook'] ?? '',
            'contact_social_instagram' => $data['social_instagram'] ?? '',
            'contact_office_hours_weekdays' => $data['office_hours_weekdays'] ?? '',
            'contact_office_hours_saturday' => $data['office_hours_saturday'] ?? '',
            'contact_office_hours_sunday' => $data['office_hours_sunday'] ?? '',
        ];

        foreach ($options as $key => $value) {
            Option::set($key, $value);
        }

        Notification::make()
            ->title('Contact settings saved successfully!')
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

