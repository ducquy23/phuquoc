<?php

namespace App\Services;

use App\Models\HeroFilterBed;
use App\Models\HeroFilterPropertyType;
use App\Models\Option;
use App\Models\Ward;
use Awcodes\Curator\Models\Media;

class HeroFilterService
{
    /**
     * Get all locations for hero filter dropdown.
     * Gets wards from province_id = 35 (Phu Quoc) and adds "All Main Locations" at the beginning.
     *
     * @return array
     */
    public function getLocations(): array
    {
        $wards = Ward::where('province_id', 35)
            ->orderBy('iorder', 'asc')
            ->orderBy('name', 'asc')
            ->pluck('name')
            ->toArray();

        // Add "All Main Locations" at the beginning
        return array_merge(['All Main Locations'], $wards);
    }

    /**
     * Get all property types for hero filter dropdown.
     * Ensures "All Types" is always at the beginning.
     *
     * @return array
     */
    public function getPropertyTypes(): array
    {
        $types = HeroFilterPropertyType::where('is_active', true)
            ->orderBy('sort_order', 'asc')
            ->pluck('name')
            ->toArray();

        if (empty($types)) {
            return [
                'All Types',
                'Studio',
                '1 Bedroom',
                '2 Bedrooms',
                'Apartment',
                'Bungalow',
                'House',
                'Shop House',
                'Villa',
            ];
        }

        // Ensure "All Types" is at the beginning
        if (!in_array('All Types', $types)) {
            return array_merge(['All Types'], $types);
        }

        // If "All Types" exists, move it to the beginning
        $allTypesIndex = array_search('All Types', $types);
        if ($allTypesIndex !== false && $allTypesIndex !== 0) {
            unset($types[$allTypesIndex]);
            return array_merge(['All Types'], array_values($types));
        }

        return $types;
    }

    /**
     * Get all bed options for hero filter dropdown.
     * Ensures "All Beds" is always at the beginning.
     *
     * @return array
     */
    public function getBeds(): array
    {
        $beds = HeroFilterBed::where('is_active', true)
            ->orderBy('sort_order', 'asc')
            ->pluck('name')
            ->toArray();

        if (empty($beds)) {
            return [
                'All Beds',
                '1 Bed',
                '2 Beds',
                '3 Beds',
                '4 Beds',
                '5+ Beds',
            ];
        }

        // Ensure "All Beds" is at the beginning
        if (!in_array('All Beds', $beds)) {
            return array_merge(['All Beds'], $beds);
        }

        // If "All Beds" exists, move it to the beginning
        $allBedsIndex = array_search('All Beds', $beds);
        if ($allBedsIndex !== false && $allBedsIndex !== 0) {
            unset($beds[$allBedsIndex]);
            return array_merge(['All Beds'], array_values($beds));
        }

        return $beds;
    }

    /**
     * Get featured apartment data for hero section.
     *
     * @return array
     */
    public function getFeaturedApartment(): array
    {
        $imageOption = Option::get('hero_featured_apartment_image', '');
        $imageUrl = $this->getImageUrl($imageOption);

        return [
            'title' => Option::get('hero_featured_apartment_title', '18th Floor Sunset Town Phu Quoc | One Bedroom'),
            'description' => Option::get('hero_featured_apartment_description', 'Sea + Firework View'),
            'beds' => Option::get('hero_featured_apartment_beds', '1 Bed'),
            'area' => Option::get('hero_featured_apartment_area', '50 m²'),
            'price' => Option::get('hero_featured_apartment_price', '$732'),
            'image' => $imageUrl,
        ];
    }

    /**
     * Get image URL from option value.
     * If it's numeric, treat as Curator ID and get URL from Media model.
     * Otherwise, treat as direct URL.
     *
     * @param string $imageOption
     * @return string
     */
    private function getImageUrl(string $imageOption): string
    {
        if (empty($imageOption)) {
            return 'https://lh3.googleusercontent.com/aida-public/AB6AXuDms_FNhLLxe-Nloyhv-339Ogd8l-cpI83QgWbA6fsyY9WZBRMAG00Ztz4AeuMXg-3n7VYZxqEnL4O_3WWXZGB9lx_Xr2hlF5p5SiZi_CdodhaYLAxq5vNs0VPsSX_JJ7nFrR5pIiQAJbCOorF_jf6OTfvLHZDDBoTURGA4-B5EXlRbZsyCiZh3HDnes99QAOUqwv_wxONuWxP0dCuDUDRCuIXhNAEaCP4K28y1dh2kf_LVyW_2G8nWgTICpR9TspneCftKYnMmC4nv';
        }

        if (is_numeric($imageOption)) {
            try {
                $media = Media::find((int)$imageOption);
                if ($media && $media->url) {
                    return $media->url;
                }
            } catch (\Exception $e) {
                logger()->error($e);
            }
            return 'https://lh3.googleusercontent.com/aida-public/AB6AXuDms_FNhLLxe-Nloyhv-339Ogd8l-cpI83QgWbA6fsyY9WZBRMAG00Ztz4AeuMXg-3n7VYZxqEnL4O_3WWXZGB9lx_Xr2hlF5p5SiZi_CdodhaYLAxq5vNs0VPsSX_JJ7nFrR5pIiQAJbCOorF_jf6OTfvLHZDDBoTURGA4-B5EXlRbZsyCiZh3HDnes99QAOUqwv_wxONuWxP0dCuDUDRCuIXhNAEaCP4K28y1dh2kf_LVyW_2G8nWgTICpR9TspneCftKYnMmC4nv';
        }

        // Otherwise, it's a direct URL
        return $imageOption;
    }
}

