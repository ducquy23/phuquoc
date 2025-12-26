<?php

namespace Database\Seeders;

use App\Models\HeroFilterLocation;
use App\Models\HeroFilterPropertyType;
use App\Models\HeroFilterBed;
use Illuminate\Database\Seeder;

class HeroFilterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Seed Locations
        $locations = [
            ['name' => 'All Main Locations', 'sort_order' => 0, 'is_active' => true],
            ['name' => 'Sunset Town', 'sort_order' => 1, 'is_active' => true],
            ['name' => 'An Thoi', 'sort_order' => 2, 'is_active' => true],
            ['name' => 'Duong Dong', 'sort_order' => 3, 'is_active' => true],
            ['name' => 'Duong To', 'sort_order' => 4, 'is_active' => true],
        ];

        foreach ($locations as $location) {
            HeroFilterLocation::updateOrCreate(
                ['name' => $location['name']],
                $location
            );
        }

        // Seed Property Types
        $propertyTypes = [
            ['name' => 'All Types', 'sort_order' => 0, 'is_active' => true],
            ['name' => 'Studio', 'sort_order' => 1, 'is_active' => true],
            ['name' => '1 Bedroom', 'sort_order' => 2, 'is_active' => true],
            ['name' => '2 Bedrooms', 'sort_order' => 3, 'is_active' => true],
            ['name' => 'Apartment', 'sort_order' => 4, 'is_active' => true],
            ['name' => 'Bungalow', 'sort_order' => 5, 'is_active' => true],
            ['name' => 'House', 'sort_order' => 6, 'is_active' => true],
            ['name' => 'Shop House', 'sort_order' => 7, 'is_active' => true],
            ['name' => 'Villa', 'sort_order' => 8, 'is_active' => true],
        ];

        foreach ($propertyTypes as $type) {
            HeroFilterPropertyType::updateOrCreate(
                ['name' => $type['name']],
                $type
            );
        }

        // Seed Beds
        $beds = [
            ['name' => 'All Beds', 'sort_order' => 0, 'is_active' => true],
            ['name' => '1 Bed', 'sort_order' => 1, 'is_active' => true],
            ['name' => '2 Beds', 'sort_order' => 2, 'is_active' => true],
            ['name' => '3 Beds', 'sort_order' => 3, 'is_active' => true],
            ['name' => '4 Beds', 'sort_order' => 4, 'is_active' => true],
            ['name' => '5+ Beds', 'sort_order' => 5, 'is_active' => true],
        ];

        foreach ($beds as $bed) {
            HeroFilterBed::updateOrCreate(
                ['name' => $bed['name']],
                $bed
            );
        }
    }
}
