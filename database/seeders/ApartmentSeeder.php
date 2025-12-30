<?php

namespace Database\Seeders;

use App\Models\Apartment;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ApartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get or create admin user
        $admin = User::firstOrCreate(
            ['email' => 'admin@phuquoc.com'],
            [
                'name' => 'Admin User',
                'password' => bcrypt('password'),
            ]
        );

        $apartments = [
            [
                'title' => '18th Floor Sunset Town Phu Quoc | One Bedroom',
                'slug' => '18th-floor-sunset-town-phu-quoc-one-bedroom',
                'description' => 'Experience luxury living at its finest on the 18th floor of the iconic Sunset Town complex. This stunning one-bedroom apartment offers breathtaking panoramic views of the ocean and the famous nightly fireworks display.

The apartment features a modern open-plan layout, a fully equipped kitchen with high-end appliances, and a spacious balcony perfect for enjoying your morning coffee or evening cocktails.

Located just steps away from the beach, vibrant restaurants, and local markets, this is the perfect base for your long-term stay in Phu Quoc. Includes high-speed WiFi and weekly cleaning service.',
                'excerpt' => 'Sea + Firework View',
                'property_type' => 'apartment',
                'bedrooms' => 1,
                'bathrooms' => 1,
                'area' => 50.00,
                'floor' => 18,
                'total_floors' => 20,
                'location' => 'Sunset Town',
                'address' => 'An Thoi, Sunset Town, Phu Quoc Island',
                'district' => 'An Thoi',
                'latitude' => 10.2856,
                'longitude' => 103.9845,
                'price_monthly' => 732.00,
                'price_daily' => 35.00,
                'currency' => 'USD',
                'deposit' => 1464.00,
                'pricing_notes' => 'Utilities not included. Monthly cleaning service included.',
                'amenities' => ['air_conditioning', 'wifi', 'swimming_pool', 'fitness_center', 'smart_tv', 'security_24_7', 'washing_machine', 'balcony'],
                'features' => ['ocean_view', 'firework_view', 'furnished', 'modern_kitchen'],
                'status' => 'available',
                'is_featured' => true,
                'is_published' => true,
                'published_at' => now()->subDays(30),
                'available_from' => now(),
                'meta_title' => '18th Floor Sunset Town Phu Quoc | One Bedroom Apartment for Rent',
                'meta_description' => 'Luxury one-bedroom apartment on 18th floor with ocean and firework views. Modern amenities, fully furnished, available now in Sunset Town, Phu Quoc.',
                'meta_keywords' => ['sunset town', 'phu quoc apartment', 'ocean view', 'one bedroom'],
                'noindex' => false,
                'nofollow' => false,
                'category_tags' => ['1BR', 'Studio'],
                'location_tags' => ['Sunset Town', 'An Thoi'],
            ],
            [
                'title' => 'Modern Studio An Thoi Center',
                'slug' => 'modern-studio-an-thoi-center',
                'description' => 'Compact and stylish studio apartment in the heart of An Thoi. Perfect for solo travelers or couples looking for a central location with easy access to markets, restaurants, and nightlife.

The studio features a well-designed layout that maximizes space, a modern bathroom, and a kitchenette with all essential appliances. The building offers 24/7 security and is just a 5-minute walk from the local market.',
                'excerpt' => 'City View, Close to Market',
                'property_type' => 'studio',
                'bedrooms' => 0,
                'bathrooms' => 1,
                'area' => 35.00,
                'floor' => 5,
                'total_floors' => 8,
                'location' => 'An Thoi',
                'address' => 'An Thoi Center, Phu Quoc',
                'district' => 'An Thoi',
                'latitude' => 10.2789,
                'longitude' => 103.9876,
                'price_monthly' => 450.00,
                'price_daily' => 25.00,
                'currency' => 'USD',
                'deposit' => 900.00,
                'pricing_notes' => 'Utilities included. Minimum 3 months lease.',
                'amenities' => ['air_conditioning', 'wifi', 'security_24_7', 'washing_machine'],
                'features' => ['city_view', 'furnished', 'central_location'],
                'status' => 'available',
                'is_featured' => false,
                'is_published' => true,
                'published_at' => now()->subDays(25),
                'available_from' => now(),
                'meta_title' => 'Modern Studio Apartment in An Thoi Center, Phu Quoc',
                'meta_description' => 'Stylish studio apartment in An Thoi center. Close to markets and restaurants. Fully furnished, utilities included. Available now.',
                'meta_keywords' => ['an thoi', 'studio apartment', 'phu quoc'],
                'noindex' => false,
                'nofollow' => false,
                'category_tags' => ['Studio'],
                'location_tags' => ['An Thoi'],
            ],
            [
                'title' => 'Luxury 3BR Villa with Pool',
                'slug' => 'luxury-3br-villa-with-pool',
                'description' => 'Stunning beachfront villa with private pool and direct access to the beach. This spacious 3-bedroom property is perfect for families or groups seeking luxury and privacy.

The villa features a modern design with large living areas, fully equipped kitchen, and three en-suite bedrooms. The private pool and outdoor terrace offer the perfect space for relaxation and entertainment. Located in a quiet, exclusive area with 24/7 security.',
                'excerpt' => 'Beachfront, Private Pool',
                'property_type' => 'villa',
                'bedrooms' => 3,
                'bathrooms' => 3,
                'area' => 180.00,
                'floor' => 1,
                'total_floors' => 2,
                'location' => 'Bai Khem',
                'address' => 'Bai Khem Beach, Phu Quoc',
                'district' => 'Duong Dong',
                'latitude' => 10.3123,
                'longitude' => 103.9654,
                'price_monthly' => 2100.00,
                'price_daily' => 120.00,
                'currency' => 'USD',
                'deposit' => 4200.00,
                'pricing_notes' => 'Utilities not included. Pool maintenance included. Minimum 6 months lease.',
                'amenities' => ['air_conditioning', 'wifi', 'swimming_pool', 'private_pool', 'security_24_7', 'washing_machine', 'parking'],
                'features' => ['beachfront', 'ocean_view', 'private_pool', 'furnished', 'garden'],
                'status' => 'available',
                'is_featured' => false,
                'is_published' => true,
                'published_at' => now()->subDays(20),
                'available_from' => now()->addDays(30),
                'meta_title' => 'Luxury 3BR Beachfront Villa with Private Pool in Phu Quoc',
                'meta_description' => 'Stunning 3-bedroom beachfront villa with private pool. Direct beach access, fully furnished, perfect for families. Available December 1st.',
                'meta_keywords' => ['villa', 'beachfront', 'private pool', 'phu quoc'],
                'noindex' => false,
                'nofollow' => false,
                'category_tags' => ['3BR'],
                'location_tags' => ['Bai Khem', 'Duong Dong'],
            ],
            [
                'title' => 'Cozy 2BR Duong Dong Apartment',
                'slug' => 'cozy-2br-duong-dong-apartment',
                'description' => 'Comfortable two-bedroom apartment in a quiet residential area of Duong Dong. Ideal for couples or small families looking for a peaceful home base while still being close to amenities.

The apartment features two spacious bedrooms, a modern bathroom, and a fully equipped kitchen. The building is well-maintained with friendly neighbors and is within walking distance of shops, restaurants, and the night market.',
                'excerpt' => 'Central Location, Quiet Area',
                'property_type' => 'apartment',
                'bedrooms' => 2,
                'bathrooms' => 2,
                'area' => 75.00,
                'floor' => 3,
                'total_floors' => 6,
                'location' => 'Duong Dong',
                'address' => 'Duong Dong Town, Phu Quoc',
                'district' => 'Duong Dong',
                'latitude' => 10.2756,
                'longitude' => 103.9789,
                'price_monthly' => 650.00,
                'price_daily' => 40.00,
                'currency' => 'USD',
                'deposit' => 1300.00,
                'pricing_notes' => 'Utilities not included. Minimum 3 months lease.',
                'amenities' => ['air_conditioning', 'wifi', 'security_24_7', 'washing_machine', 'parking'],
                'features' => ['furnished', 'quiet_area', 'central_location'],
                'status' => 'available',
                'is_featured' => false,
                'is_published' => true,
                'published_at' => now()->subDays(15),
                'available_from' => now(),
                'meta_title' => 'Cozy 2BR Apartment in Duong Dong, Phu Quoc',
                'meta_description' => 'Comfortable two-bedroom apartment in quiet Duong Dong area. Fully furnished, close to amenities. Available now.',
                'meta_keywords' => ['duong dong', '2 bedroom', 'apartment', 'phu quoc'],
                'noindex' => false,
                'nofollow' => false,
                'category_tags' => ['2BR'],
                'location_tags' => ['Duong Dong'],
            ],
            [
                'title' => 'Compact Studio near Night Market',
                'slug' => 'compact-studio-near-night-market',
                'description' => 'Affordable studio apartment located just steps away from Duong Dong Night Market. Perfect for budget-conscious travelers who want to be in the heart of the action.

This compact studio is fully furnished with all essentials including a comfortable bed, kitchenette, and private bathroom. The location is unbeatable for food lovers and those who enjoy the vibrant nightlife scene.',
                'excerpt' => 'Walking distance to nightlife',
                'property_type' => 'studio',
                'bedrooms' => 0,
                'bathrooms' => 1,
                'area' => 28.00,
                'floor' => 2,
                'total_floors' => 4,
                'location' => 'Duong Dong',
                'address' => 'Near Night Market, Duong Dong, Phu Quoc',
                'district' => 'Duong Dong',
                'latitude' => 10.2734,
                'longitude' => 103.9812,
                'price_monthly' => 350.00,
                'price_daily' => 20.00,
                'currency' => 'USD',
                'deposit' => 700.00,
                'pricing_notes' => 'Utilities included. Minimum 1 month lease.',
                'amenities' => ['air_conditioning', 'wifi', 'security_24_7'],
                'features' => ['furnished', 'central_location', 'night_market'],
                'status' => 'available',
                'is_featured' => false,
                'is_published' => true,
                'published_at' => now()->subDays(10),
                'available_from' => now(),
                'meta_title' => 'Compact Studio Apartment near Night Market, Phu Quoc',
                'meta_description' => 'Affordable studio apartment near Duong Dong Night Market. Fully furnished, utilities included. Perfect for budget travelers.',
                'meta_keywords' => ['studio', 'night market', 'budget', 'phu quoc'],
                'noindex' => false,
                'nofollow' => false,
                'category_tags' => ['Studio'],
                'location_tags' => ['Duong Dong'],
            ],
            [
                'title' => 'Premium Serviced Apartment',
                'slug' => 'premium-serviced-apartment',
                'description' => 'Luxury serviced apartment with weekly cleaning and gym access included. This modern one-bedroom unit is perfect for professionals and long-term residents who value convenience and comfort.

The apartment comes with all modern amenities including high-speed WiFi, smart TV, and a fully equipped kitchen. The building features a state-of-the-art fitness center, swimming pool, and 24/7 concierge service.',
                'excerpt' => 'Cleaning included, Gym Access',
                'property_type' => 'apartment',
                'bedrooms' => 1,
                'bathrooms' => 1,
                'area' => 45.00,
                'floor' => 12,
                'total_floors' => 15,
                'location' => 'Sunset Town',
                'address' => 'Sunset Town Complex, Phu Quoc',
                'district' => 'An Thoi',
                'latitude' => 10.2878,
                'longitude' => 103.9856,
                'price_monthly' => 550.00,
                'price_daily' => 30.00,
                'currency' => 'USD',
                'deposit' => 1100.00,
                'pricing_notes' => 'Weekly cleaning and gym access included. Utilities not included.',
                'amenities' => ['air_conditioning', 'wifi', 'swimming_pool', 'fitness_center', 'smart_tv', 'security_24_7', 'washing_machine', 'concierge'],
                'features' => ['furnished', 'serviced', 'modern', 'gym_access'],
                'status' => 'available',
                'is_featured' => false,
                'is_published' => true,
                'published_at' => now()->subDays(5),
                'available_from' => now(),
                'meta_title' => 'Premium Serviced Apartment with Gym Access in Phu Quoc',
                'meta_description' => 'Luxury serviced apartment with weekly cleaning and gym access. Modern amenities, fully furnished. Available now in Sunset Town.',
                'meta_keywords' => ['serviced apartment', 'gym', 'sunset town', 'phu quoc'],
                'noindex' => false,
                'nofollow' => false,
                'category_tags' => ['1BR'],
                'location_tags' => ['Sunset Town', 'An Thoi'],
            ],
            [
                'title' => 'Ocean View 1BR Condo',
                'slug' => 'ocean-view-1br-condo',
                'description' => 'Beautiful one-bedroom condo with stunning ocean views from the living room and bedroom. Located in a modern building with excellent amenities.

The unit features floor-to-ceiling windows, a modern kitchen, and a spacious balcony perfect for enjoying the sunset. The building offers a rooftop pool, fitness center, and secure parking.',
                'excerpt' => 'Ocean View, Modern Building',
                'property_type' => 'condo',
                'bedrooms' => 1,
                'bathrooms' => 1,
                'area' => 45.00,
                'floor' => 10,
                'total_floors' => 18,
                'location' => 'Sunset Town',
                'address' => 'Sunset Town, Phu Quoc',
                'district' => 'An Thoi',
                'latitude' => 10.2867,
                'longitude' => 103.9841,
                'price_monthly' => 650.00,
                'price_daily' => 35.00,
                'currency' => 'USD',
                'deposit' => 1300.00,
                'pricing_notes' => 'Utilities not included. Minimum 3 months lease.',
                'amenities' => ['air_conditioning', 'wifi', 'swimming_pool', 'fitness_center', 'smart_tv', 'security_24_7', 'parking'],
                'features' => ['ocean_view', 'furnished', 'modern', 'balcony'],
                'status' => 'available',
                'is_featured' => false,
                'is_published' => true,
                'published_at' => now()->subDays(3),
                'available_from' => now(),
                'meta_title' => 'Ocean View 1BR Condo in Sunset Town, Phu Quoc',
                'meta_description' => 'Beautiful one-bedroom condo with ocean views. Modern building with pool and gym. Fully furnished. Available now.',
                'meta_keywords' => ['ocean view', 'condo', 'sunset town', 'phu quoc'],
                'noindex' => false,
                'nofollow' => false,
                'category_tags' => ['1BR'],
                'location_tags' => ['Sunset Town', 'An Thoi'],
            ],
            [
                'title' => 'Beachfront Mini Villa',
                'slug' => 'beachfront-mini-villa',
                'description' => 'Charming two-bedroom mini villa directly on the beach. Wake up to the sound of waves and enjoy direct access to a pristine beach.

This cozy villa features a traditional Vietnamese design with modern amenities. The property includes a private garden, outdoor dining area, and is perfect for those seeking a peaceful beachfront lifestyle.',
                'excerpt' => 'Beachfront, Private Garden',
                'property_type' => 'villa',
                'bedrooms' => 2,
                'bathrooms' => 2,
                'area' => 80.00,
                'floor' => 1,
                'total_floors' => 1,
                'location' => 'Bai Khem',
                'address' => 'Bai Khem Beach, Phu Quoc',
                'district' => 'Duong Dong',
                'latitude' => 10.3101,
                'longitude' => 103.9634,
                'price_monthly' => 1200.00,
                'price_daily' => 80.00,
                'currency' => 'USD',
                'deposit' => 2400.00,
                'pricing_notes' => 'Utilities not included. Minimum 6 months lease.',
                'amenities' => ['air_conditioning', 'wifi', 'security_24_7', 'parking', 'garden'],
                'features' => ['beachfront', 'ocean_view', 'furnished', 'garden', 'private'],
                'status' => 'available',
                'is_featured' => false,
                'is_published' => true,
                'published_at' => now()->subDays(1),
                'available_from' => now(),
                'meta_title' => 'Beachfront Mini Villa in Bai Khem, Phu Quoc',
                'meta_description' => 'Charming two-bedroom beachfront villa with private garden. Direct beach access, fully furnished. Perfect for beach lovers.',
                'meta_keywords' => ['beachfront', 'villa', 'bai khem', 'phu quoc'],
                'noindex' => false,
                'nofollow' => false,
                'category_tags' => ['2BR'],
                'location_tags' => ['Bai Khem', 'Duong Dong'],
            ],
        ];

        foreach ($apartments as $aptData) {
            $categoryTags = $aptData['category_tags'] ?? [];
            $locationTags = $aptData['location_tags'] ?? [];
            unset($aptData['category_tags'], $aptData['location_tags']);

            // Check if apartment already exists
            $apartment = Apartment::firstOrCreate(
                ['slug' => $aptData['slug']],
                array_merge($aptData, [
                    'created_by' => $admin->id,
                    'updated_by' => $admin->id,
                ])
            );

            // Attach category tags
            if (!empty($categoryTags)) {
                $apartment->syncTagsWithType($categoryTags, 'apartment_categories');
            }

            // Attach location tags
            if (!empty($locationTags)) {
                $apartment->syncTagsWithType($locationTags, 'locations');
            }
        }
    }
}





