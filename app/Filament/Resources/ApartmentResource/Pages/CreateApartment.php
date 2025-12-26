<?php

namespace App\Filament\Resources\ApartmentResource\Pages;

use App\Filament\Resources\ApartmentResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateApartment extends CreateRecord
{
    protected static string $resource = ApartmentResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
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

        if (isset($data['google_maps_embed']) && !empty($data['google_maps_embed'])) {
            $embed = $data['google_maps_embed'];
            $embed = preg_replace('/width=["\']\d+["\']/', 'width="100%"', $embed);
            $embed = preg_replace('/height=["\']\d+["\']/', 'height="100%"', $embed);
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
