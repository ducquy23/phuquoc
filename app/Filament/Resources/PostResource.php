<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Filament\Resources\PostResource\RelationManagers;
use App\Forms\Components\CKEditor;
use App\Models\Post;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\SpatieTagsInput;
use Filament\Infolists\Components\SpatieTagsEntry;
use Filament\Infolists\Infolist;
use Filament\Infolists\Components\Section as InfolistSection;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\ImageEntry;
use Awcodes\Curator\Components\Forms\CuratorPicker;
use Illuminate\Support\Facades\Auth;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationGroup = 'Content';
    protected static ?int $navigationSort = 2;
    protected static ?string $label = 'Blog Post';
    protected static ?string $pluralLabel = 'Blog Posts';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Tabs::make('PostTabs')
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
                                Forms\Components\Select::make('author_id')
                                    ->relationship('author', 'name')
                                    ->required()
                                    ->default(fn () => Auth::id())
                                    ->columnSpan(1),
                                Forms\Components\Select::make('category')
                                    ->label('Main Category')
                                    ->options(config('blog.categories'))
                                    ->searchable()
                                    ->preload()
                                    ->helperText('Select a category for this post')
                                    ->columnSpan(1),
                                Forms\Components\TextInput::make('reading_time')
                                    ->label('Reading Time (minutes)')
                                    ->numeric()
                                    ->helperText('Auto-calculated from content if left empty (200 words/min)')
                                    ->columnSpan(1),
                            ])
                            ->columns(2),

                        Forms\Components\Tabs\Tab::make('Content')
                            ->icon('heroicon-o-document-text')
                            ->schema([
                                CKEditor::make('content')
                                    ->label('Nội dung')
                                    ->required()
                                    ->columnSpanFull(),
                            ]),

                        Forms\Components\Tabs\Tab::make('Tags')
                            ->icon('heroicon-o-tag')
                            ->schema([
                                SpatieTagsInput::make('tags')
                                    ->label('Blog Tags')
                                    ->type('blog_tags')
                                    ->helperText('Tags cho blog posts: Phú Quốc, Căn hộ, Du lịch, v.v.')
                                    ->columnSpanFull(),
                            ]),

                        Forms\Components\Tabs\Tab::make('Media')
                            ->icon('heroicon-o-photo')
                            ->schema([
                                CuratorPicker::make('featured_image_id')
                                    ->label('Featured Image')
                                    ->helperText('Select featured image from Curator media library')
                                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp', 'image/gif'])
                                    ->directory('posts')
                                    ->visibility('public')
                                    ->extraAttributes(['class' => 'custom-curator-picker'])
                                    ->columnSpan(1),
                                Forms\Components\TextInput::make('og_image_url')
                                    ->label('OG Image URL (Alternative)')
                                    ->url()
                                    ->maxLength(2048)
                                    ->helperText('Or provide direct image URL for Open Graph (optional)')
                                    ->columnSpan(1),
                            ])
                            ->columns(2),

                        Forms\Components\Tabs\Tab::make('SEO Settings')
                            ->icon('heroicon-o-magnifying-glass')
                            ->schema([
                                Forms\Components\TextInput::make('meta_title')
                                    ->label('Meta Title')
                                    ->maxLength(255)
                                    ->helperText('Leave empty to use post title')
                                    ->columnSpan(2),
                                Forms\Components\Textarea::make('meta_description')
                                    ->label('Meta Description')
                                    ->rows(3)
                                    ->helperText('Leave empty to use excerpt')
                                    ->columnSpanFull(),
                                Forms\Components\TextInput::make('focus_keyword')
                                    ->label('Focus Keyword')
                                    ->maxLength(255)
                                    ->helperText('Primary keyword for SEO optimization')
                                    ->columnSpan(1),
                                Forms\Components\TextInput::make('canonical_url')
                                    ->label('Canonical URL')
                                    ->url()
                                    ->maxLength(255)
                                    ->helperText('Leave empty to use default URL')
                                    ->columnSpan(1),
//                                Forms\Components\Textarea::make('schema_markup')
//                                    ->label('Schema Markup (JSON-LD)')
//                                    ->rows(5)
//                                    ->helperText('JSON-LD structured data for Article schema (optional)')
//                                    ->columnSpanFull(),
                                Forms\Components\Toggle::make('noindex')
                                    ->label('No Index')
                                    ->helperText('Prevent search engines from indexing this post')
                                    ->columnSpan(1),
                                Forms\Components\Toggle::make('nofollow')
                                    ->label('No Follow')
                                    ->helperText('Prevent search engines from following links')
                                    ->columnSpan(1),
                            ])
                            ->columns(2),

                        Forms\Components\Tabs\Tab::make('Status & Settings')
                            ->icon('heroicon-o-cog-6-tooth')
                            ->schema([
                                Forms\Components\Toggle::make('is_featured')
                                    ->label('Featured Post')
                                    ->helperText('Show this post as featured on blog listing'),
                                Forms\Components\Toggle::make('is_published')
                                    ->label('Published')
                                    ->default(true)
                                    ->helperText('Make this post visible on the website'),
                                Forms\Components\DateTimePicker::make('published_at')
                                    ->label('Published At')
                                    ->default(now())
                                    ->helperText('Schedule publication date'),
                                Forms\Components\TextInput::make('views')
                                    ->label('Views')
                                    ->numeric()
                                    ->default(0)
                                    ->disabled()
                                    ->helperText('Total number of views (read-only)'),
                                Forms\Components\TextInput::make('likes')
                                    ->label('Likes')
                                    ->numeric()
                                    ->default(0)
                                    ->disabled()
                                    ->helperText('Total number of likes (read-only)'),
                            ])
                            ->columns(2),
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
                Tables\Columns\TextColumn::make('author.name')
                    ->label('Author')
                    ->sortable(),
                Tables\Columns\TextColumn::make('category')
                    ->label('Category')
                    ->badge()
                    ->formatStateUsing(fn ($state) => config('blog.categories')[$state] ?? $state)
                    ->color(fn ($state) => match($state) {
                        'apartment-hunting' => 'info',
                        'local-life' => 'success',
                        'travel-tips' => 'warning',
                        'legal-visa' => 'danger',
                        default => 'gray',
                    })
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
                Tables\Columns\TextColumn::make('views')
                    ->label('Views')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime('Y-m-d H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('published_at', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('category')
                    ->options(config('blog.categories')),
                Tables\Filters\TernaryFilter::make('is_published')
                    ->label('Published'),
                Tables\Filters\TernaryFilter::make('is_featured')
                    ->label('Featured'),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                InfolistSection::make('Featured Image')
                    ->schema([
                        ImageEntry::make('featured_image_url')
                            ->label('')
                            ->getStateUsing(fn ($record) => $record->featured_image_url)
                            ->height(400)
                            ->width('100%')
                            ->columnSpanFull(),
                    ])
                    ->collapsible(),

                InfolistSection::make('Basic Information')
                    ->schema([
                        TextEntry::make('title')
                            ->label('Title'),
                        TextEntry::make('slug')
                            ->label('Slug'),
                        TextEntry::make('excerpt')
                            ->label('Excerpt')
                            ->columnSpanFull(),
                        TextEntry::make('author.name')
                            ->label('Author'),
                        TextEntry::make('category')
                            ->label('Category')
                            ->badge(),
                        TextEntry::make('reading_time')
                            ->label('Reading Time')
                            ->suffix(' minutes'),
                    ])
                    ->columns(2),

                InfolistSection::make('Tags')
                    ->schema([
                        SpatieTagsEntry::make('tags')
                            ->label('Blog Tags')
                            ->type('blog_tags'),
                    ]),

                InfolistSection::make('Content')
                    ->schema([
                        TextEntry::make('content')
                            ->label('Content')
                            ->html()
                            ->columnSpanFull(),
                    ])
                    ->collapsible(),

                InfolistSection::make('Status & Statistics')
                    ->schema([
                        IconEntry::make('is_featured')
                            ->label('Featured')
                            ->boolean(),
                        IconEntry::make('is_published')
                            ->label('Published')
                            ->boolean(),
                        TextEntry::make('published_at')
                            ->label('Published At')
                            ->dateTime('Y-m-d H:i'),
                        TextEntry::make('views')
                            ->label('Views')
                            ->numeric(),
                        TextEntry::make('likes')
                            ->label('Likes')
                            ->numeric(),
                    ])
                    ->columns(3),

                InfolistSection::make('SEO Information')
                    ->schema([
                        TextEntry::make('meta_title')
                            ->label('Meta Title'),
                        TextEntry::make('meta_description')
                            ->label('Meta Description')
                            ->columnSpanFull(),
                        TextEntry::make('focus_keyword')
                            ->label('Focus Keyword'),
                        TextEntry::make('canonical_url')
                            ->label('Canonical URL')
                            ->url(fn ($state) => $state ?: null),
                        IconEntry::make('noindex')
                            ->label('No Index')
                            ->boolean(),
                        IconEntry::make('nofollow')
                            ->label('No Follow')
                            ->boolean(),
                    ])
                    ->columns(2)
                    ->collapsible(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'view' => Pages\ViewPost::route('/{record}'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}
