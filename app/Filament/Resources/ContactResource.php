<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactResource\Pages;
use App\Models\Contact;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Infolists\Infolist;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\IconEntry;
use Illuminate\Support\Facades\Auth;

class ContactResource extends Resource
{
    protected static ?string $model = Contact::class;

    protected static ?string $navigationIcon = 'heroicon-o-envelope';
    protected static ?string $navigationGroup = 'Content';
    protected static ?int $navigationSort = 3;
    protected static ?string $label = 'Contact Message';
    protected static ?string $pluralLabel = 'Contact Messages';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Contact Information')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255)
                            ->columnSpan(1),
                        Forms\Components\TextInput::make('email')
                            ->email()
                            ->maxLength(255)
                            ->columnSpan(1),
                        Forms\Components\TextInput::make('phone')
                            ->tel()
                            ->maxLength(255)
                            ->columnSpan(1),
                        Forms\Components\TextInput::make('zalo')
                            ->maxLength(255)
                            ->columnSpan(1),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Message Details')
                    ->schema([
                        Forms\Components\Select::make('inquiry_type')
                            ->options([
                                'long_term' => 'Long-term Rental',
                                'short_term' => 'Short-term Holiday Stay',
                                'motorbike' => 'Motorbike Rental',
                                'general' => 'General Inquiry',
                            ])
                            ->required()
                            ->columnSpan(1),
                        Forms\Components\Select::make('status')
                            ->options([
                                'new' => 'New',
                                'read' => 'Read',
                                'replied' => 'Replied',
                                'archived' => 'Archived',
                            ])
                            ->required()
                            ->default('new')
                            ->columnSpan(1),
                        Forms\Components\TextInput::make('subject')
                            ->maxLength(255)
                            ->columnSpanFull(),
                        Forms\Components\Textarea::make('message')
                            ->rows(5)
                            ->columnSpanFull(),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Admin Notes')
                    ->schema([
                        Forms\Components\Textarea::make('admin_notes')
                            ->rows(4)
                            ->columnSpanFull(),
                        Forms\Components\Select::make('responded_by')
                            ->relationship('respondedBy', 'name')
                            ->default(fn () => Auth::id())
                            ->columnSpan(1),
                        Forms\Components\DateTimePicker::make('responded_at')
                            ->default(now())
                            ->columnSpan(1),
                    ])
                    ->columns(2)
                    ->collapsible(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),
                Tables\Columns\TextColumn::make('email')
                    ->searchable()
                    ->icon('heroicon-o-envelope')
                    ->copyable(),
                Tables\Columns\TextColumn::make('phone')
                    ->searchable()
                    ->icon('heroicon-o-phone')
                    ->copyable(),
                Tables\Columns\TextColumn::make('subject')
                    ->searchable()
                    ->limit(30),
                Tables\Columns\TextColumn::make('inquiry_type')
                    ->badge()
                    ->formatStateUsing(fn ($state) => match($state) {
                        'long_term' => 'Long-term',
                        'short_term' => 'Short-term',
                        'motorbike' => 'Motorbike',
                        default => 'General',
                    })
                    ->color(fn ($state) => match($state) {
                        'long_term' => 'success',
                        'short_term' => 'info',
                        'motorbike' => 'warning',
                        default => 'gray',
                    }),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn ($state) => match($state) {
                        'new' => 'danger',
                        'read' => 'warning',
                        'replied' => 'success',
                        'archived' => 'gray',
                        default => 'gray',
                    }),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime('Y-m-d H:i')
                    ->sortable()
                    ->toggleable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'new' => 'New',
                        'read' => 'Read',
                        'replied' => 'Replied',
                        'archived' => 'Archived',
                    ]),
                Tables\Filters\SelectFilter::make('inquiry_type')
                    ->options([
                        'long_term' => 'Long-term Rental',
                        'short_term' => 'Short-term Holiday Stay',
                        'motorbike' => 'Motorbike Rental',
                        'general' => 'General Inquiry',
                    ]),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\BulkAction::make('markAsRead')
                        ->label('Mark as Read')
                        ->icon('heroicon-o-check')
                        ->action(fn ($records) => $records->each->update(['status' => 'read']))
                        ->requiresConfirmation(),
                ]),
            ]);
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Section::make('Contact Information')
                    ->schema([
                        TextEntry::make('name')
                            ->label('Name')
                            ->icon('heroicon-o-user'),
                        TextEntry::make('email')
                            ->label('Email')
                            ->icon('heroicon-o-envelope')
                            ->copyable(),
                        TextEntry::make('phone')
                            ->label('Phone')
                            ->icon('heroicon-o-phone')
                            ->copyable(),
                        TextEntry::make('zalo')
                            ->label('Zalo')
                            ->icon('heroicon-o-chat-bubble-left-right')
                            ->placeholder('Not provided'),
                    ])
                    ->columns(2),

                Section::make('Message')
                    ->schema([
                        TextEntry::make('subject')
                            ->label('Subject')
                            ->icon('heroicon-o-tag'),
                        TextEntry::make('inquiry_type')
                            ->label('Inquiry Type')
                            ->badge()
                            ->formatStateUsing(fn ($state) => match($state) {
                                'long_term' => 'Long-term Rental',
                                'short_term' => 'Short-term Holiday Stay',
                                'motorbike' => 'Motorbike Rental',
                                default => 'General Inquiry',
                            })
                            ->color(fn ($state) => match($state) {
                                'long_term' => 'success',
                                'short_term' => 'info',
                                'motorbike' => 'warning',
                                default => 'gray',
                            }),
                        TextEntry::make('message')
                            ->label('Message')
                            ->columnSpanFull(),
                        TextEntry::make('status')
                            ->label('Status')
                            ->badge()
                            ->color(fn ($state) => match($state) {
                                'new' => 'danger',
                                'read' => 'warning',
                                'replied' => 'success',
                                'archived' => 'gray',
                                default => 'gray',
                            }),
                    ])
                    ->columns(2),

                Section::make('Admin Information')
                    ->schema([
                        TextEntry::make('admin_notes')
                            ->label('Admin Notes')
                            ->placeholder('No notes')
                            ->columnSpanFull(),
                        TextEntry::make('respondedBy.name')
                            ->label('Responded By')
                            ->placeholder('Not responded yet'),
                        TextEntry::make('responded_at')
                            ->label('Responded At')
                            ->dateTime('F d, Y \a\t g:i A')
                            ->placeholder('Not responded yet'),
                        TextEntry::make('created_at')
                            ->label('Received At')
                            ->dateTime('F d, Y \a\t g:i A'),
                    ])
                    ->columns(2)
                    ->collapsible(),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListContacts::route('/'),
            'view' => Pages\ViewContact::route('/{record}'),
            'edit' => Pages\EditContact::route('/{record}/edit'),
        ];
    }
}
