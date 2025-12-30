<?php

namespace App\Filament\Resources\ApartmentResource\Pages;

use App\Filament\Resources\ApartmentResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditApartment extends EditRecord
{
    protected static string $resource = ApartmentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('view_public')
                ->label('View Public Page')
                ->icon('heroicon-o-globe-alt')
                ->color('info')
                ->url(fn () => route('apartments.show', $this->record->slug))
                ->openUrlInNewTab(),
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        if (isset($data['gallery_image_ids'])) {
            if (is_array($data['gallery_image_ids'])) {
                $cleanIds = [];
                foreach ($data['gallery_image_ids'] as $key => $value) {
                    $id = self::extractMediaId($value);
                    if ($id && is_numeric($id) && $id > 0) {
                        $cleanIds[] = (int) $id;
                    }
                }
                $data['gallery_image_ids'] = array_values(array_filter($cleanIds));
            } elseif (is_numeric($data['gallery_image_ids']) && $data['gallery_image_ids'] > 0) {
                $data['gallery_image_ids'] = [(int) $data['gallery_image_ids']];
            } else {
                $data['gallery_image_ids'] = [];
            }
        } else {
            $data['gallery_image_ids'] = [];
        }

        // Convert gallery_image_ids to gallery_images repeater format for form
        // Only set if we have valid IDs
        if (!empty($data['gallery_image_ids']) && is_array($data['gallery_image_ids'])) {
            $galleryData = [];
            foreach ($data['gallery_image_ids'] as $id) {
                if ($id && is_numeric($id) && $id > 0) {
                    $galleryData[] = ['image_id' => (int) $id];
                }
            }
            $data['gallery_images'] = $galleryData;
        } else {
            $data['gallery_images'] = [];
        }

        return $data;
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        // Convert gallery_images repeater data to gallery_image_ids array
        if (isset($data['gallery_images']) && is_array($data['gallery_images'])) {
            $ids = [];
            foreach ($data['gallery_images'] as $item) {
                if (isset($item['image_id']) && $item['image_id']) {
                    $imageId = $item['image_id'];
                    // CuratorPicker might return object/array, extract ID
                    $id = self::extractMediaId($imageId);
                    if ($id) {
                        $ids[] = $id;
                    }
                }
            }
            $data['gallery_image_ids'] = array_values(array_filter($ids));
            unset($data['gallery_images']); // Remove repeater data
        }

        // Normalize Google Maps embed iframe width/height to 100%
        if (isset($data['google_maps_embed']) && !empty($data['google_maps_embed'])) {
            $embed = $data['google_maps_embed'];
            // Replace width="600" or width='600' with width="100%"
            $embed = preg_replace('/width=["\']\d+["\']/', 'width="100%"', $embed);
            // Replace height="450" or height='450' with height="100%"
            $embed = preg_replace('/height=["\']\d+["\']/', 'height="100%"', $embed);
            // Update style to ensure full width/height
            if (preg_match('/style=["\']([^"\']*)["\']/', $embed, $matches)) {
                $style = $matches[1];
                $style = preg_replace('/width:\s*[^;]+;?/', '', $style);
                $style = preg_replace('/height:\s*[^;]+;?/', '', $style);
                $style = trim($style, '; ') . '; width:100%; height:100%;';
                $embed = preg_replace('/style=["\'][^"\']*["\']/', 'style="' . $style . '"', $embed);
            } else {
                // Add style if not present
                $embed = str_replace('<iframe', '<iframe style="width:100%; height:100%; border:0;"', $embed);
            }
            $data['google_maps_embed'] = $embed;
        }

        return $data;
    }

    /**
     * Extract media ID from CuratorPicker value
     * CuratorPicker can return: ID (int), object with 'id' key, or array with UUID keys
     */
    protected static function extractMediaId($value): ?int
    {
        return ApartmentResource::extractMediaIdFromValue($value);
    }
}
