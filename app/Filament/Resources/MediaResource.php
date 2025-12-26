<?php

namespace App\Filament\Resources;

use Awcodes\Curator\Models\Media;
use Awcodes\Curator\Resources\MediaResource as CuratorMediaResource;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\DeleteBulkAction;

class MediaResource extends CuratorMediaResource
{
    protected static ?string $model = Media::class;
    protected static ?string $navigationIcon = 'heroicon-o-photo';
    protected static ?string $navigationLabel = 'Media';
    protected static ?string $pluralModelLabel = 'Media';

    public static function form(Form $form): Form
    {
        return parent::form($form);
    }

    public static function table(Table $table): Table
    {
        return parent::table($table)
            ->columns([
                ImageColumn::make('path')
                    ->label('')
                    ->disk('public')
                    ->extraImgAttributes([
                        'style' => 'width: 100%; height: 200px; object-fit: cover; border-radius: 10px;',
                    ])
                    ->url(fn(Media $record) => static::getUrl('edit', ['record' => $record]))
                    ->openUrlInNewTab(false)
                    ->alignCenter(),

                TextColumn::make('name')
                    ->alignCenter(),

                TextColumn::make('size')
                    ->label('Dung lượng')
                    ->formatStateUsing(function (?int $state): string {
                        if ($state === null) return '-';
                        $kb = $state / 1024;
                        $mb = $kb / 1024;

                        return $mb >= 1
                            ? number_format($mb, 1) . ' MiB'
                            : number_format($kb, 1) . ' KiB';
                    })
                    ->size('sm')
                    ->alignCenter(),
            ])
            ->contentGrid([
                'md' => 2,
                'xl' => 3,
                '2xl' => 4,
            ])
            ->actions([])
            ->bulkActions([
                DeleteBulkAction::make(),
            ])
            ->defaultSort('created_at', 'desc')
            ->paginated([12, 24, 48, 96]);
    }
}
