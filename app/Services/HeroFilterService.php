<?php

namespace App\Services;

use App\Models\Option;

class HeroFilterService
{
    /**
     * Get all locations for hero filter dropdown.
     *
     * @return array
     */
    public function getLocations(): array
    {
        $locations = \App\Models\HeroFilterLocation::where('is_active', true)
            ->orderBy('sort_order', 'asc')
            ->pluck('name')
            ->toArray();
        
        if (empty($locations)) {
            return [
                'All Main Locations',
                'Sunset Town',
                'An Thoi',
                'Duong Dong',
                'Duong To',
            ];
        }
        
        return $locations;
    }

    /**
     * Get all property types for hero filter dropdown.
     *
     * @return array
     */
    public function getPropertyTypes(): array
    {
        $types = \App\Models\HeroFilterPropertyType::where('is_active', true)
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
        
        return $types;
    }

    /**
     * Get all bed options for hero filter dropdown.
     *
     * @return array
     */
    public function getBeds(): array
    {
        $beds = \App\Models\HeroFilterBed::where('is_active', true)
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

        // If it's numeric, it's a Curator ID
        if (is_numeric($imageOption)) {
            try {
                $media = \Awcodes\Curator\Models\Media::find((int)$imageOption);
                if ($media && $media->url) {
                    return $media->url;
                }
            } catch (\Exception $e) {
                // Fallback to default if error
            }
            return 'https://lh3.googleusercontent.com/aida-public/AB6AXuDms_FNhLLxe-Nloyhv-339Ogd8l-cpI83QgWbA6fsyY9WZBRMAG00Ztz4AeuMXg-3n7VYZxqEnL4O_3WWXZGB9lx_Xr2hlF5p5SiZi_CdodhaYLAxq5vNs0VPsSX_JJ7nFrR5pIiQAJbCOorF_jf6OTfvLHZDDBoTURGA4-B5EXlRbZsyCiZh3HDnes99QAOUqwv_wxONuWxP0dCuDUDRCuIXhNAEaCP4K28y1dh2kf_LVyW_2G8nWgTICpR9TspneCftKYnMmC4nv';
        }

        // Otherwise, it's a direct URL
        return $imageOption;
    }
}

