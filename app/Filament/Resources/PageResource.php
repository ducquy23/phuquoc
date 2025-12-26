<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PageResource\Pages;
use App\Models\Page;
use Awcodes\Curator\Components\Forms\CuratorPicker;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;

class PageResource extends Resource
{
    protected static ?string $model = Page::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationGroup = 'Content';
    protected static ?int $navigationSort = 1;
    protected static ?string $label = 'Page';
    protected static ?string $pluralLabel = 'Pages';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Basic Info')
                    ->schema([
                        TextInput::make('title')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('slug')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(255),
                        TextInput::make('meta_title')
                            ->label('Meta Title')
                            ->maxLength(255),
                        Forms\Components\Textarea::make('meta_description')
                            ->label('Meta Description')
                            ->rows(3),
                        Select::make('template')
                            ->options([
                                'default' => 'Default',
                                'landing' => 'Landing',
                                'seo' => 'SEO',
                            ])
                            ->default('default'),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Hero & Content')
                    ->schema([
                        CuratorPicker::make('hero_image_url')
                            ->label('Hero Image URL')
                            ->buttonLabel('Select Image')
                            ->color('primary')
                            ->multiple(false)
                            ->relationship('featuredImage', 'id'),
                        Forms\Components\RichEditor::make('body')
                            ->label('Body')
                            ->fileAttachmentsDirectory('uploads/pages')
                            ->columnSpanFull()
                            ->required(),
                    ]),

                Forms\Components\Section::make('Status')
                    ->schema([
                        Forms\Components\Toggle::make('is_home')
                            ->label('Set as Home Page')
                            ->inline(false),
                        Forms\Components\Toggle::make('is_published')
                            ->default(true)
                            ->inline(false),
                        Forms\Components\DateTimePicker::make('published_at')
                            ->label('Published At'),
                    ])
                    ->columns(3),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('slug')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('template')
                    ->badge()
                    ->colors([
                        'primary',
                    ]),
                IconColumn::make('is_published')
                    ->boolean()
                    ->label('Published'),
                TextColumn::make('published_at')
                    ->dateTime('Y-m-d H:i')
                    ->sortable(),
                TextColumn::make('updated_at')
                    ->dateTime('Y-m-d H:i')
                    ->sortable(),
            ])
            ->defaultSort('updated_at', 'desc')
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPages::route('/'),
            'create' => Pages\CreatePage::route('/create'),
            'edit' => Pages\EditPage::route('/{record}/edit'),
        ];
    }
}

