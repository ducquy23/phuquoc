<?php

namespace Database\Seeders;

use App\Models\Motorbike;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class MotorbikeSeeder extends Seeder
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

        $motorbikes = [
            [
                'name' => 'Honda Vision',
                'slug' => 'honda-vision',
                'description' => 'Perfect for daily commuting and exploring Phu Quoc. The Honda Vision is a reliable automatic scooter with excellent fuel efficiency and easy handling.',
                'type' => 'automatic',
                'engine_size' => '110cc',
                'price_daily' => 5.00,
                'price_monthly' => 120.00,
                'currency' => 'USD',
                'status' => 'available',
                'is_published' => true,
                'is_featured' => true,
                'sort_order' => 1,
                'published_at' => now(),
                'created_by' => $admin->id,
                'updated_by' => $admin->id,
            ],
            [
                'name' => 'Honda Airblade',
                'slug' => 'honda-airblade',
                'description' => 'A popular choice for both locals and tourists. The Honda Airblade offers a perfect balance of power, comfort, and style with its 125cc engine.',
                'type' => 'automatic',
                'engine_size' => '125cc',
                'price_daily' => 7.00,
                'price_monthly' => 180.00,
                'currency' => 'USD',
                'status' => 'available',
                'is_published' => true,
                'is_featured' => true,
                'sort_order' => 2,
                'published_at' => now(),
                'created_by' => $admin->id,
                'updated_by' => $admin->id,
            ],
            [
                'name' => 'Yamaha Exciter',
                'slug' => 'yamaha-exciter',
                'description' => 'For those who prefer manual transmission and more power. The Yamaha Exciter is a sporty 150cc bike perfect for longer rides and exploring the island.',
                'type' => 'manual',
                'engine_size' => '150cc',
                'price_daily' => 9.00,
                'price_monthly' => 240.00,
                'currency' => 'USD',
                'status' => 'available',
                'is_published' => true,
                'is_featured' => false,
                'sort_order' => 3,
                'published_at' => now(),
                'created_by' => $admin->id,
                'updated_by' => $admin->id,
            ],
            [
                'name' => 'Honda PCX',
                'slug' => 'honda-pcx',
                'description' => 'Premium automatic scooter with advanced features. The Honda PCX offers superior comfort, power, and style for the ultimate riding experience in Phu Quoc.',
                'type' => 'automatic',
                'engine_size' => '150cc',
                'price_daily' => 11.00,
                'price_monthly' => 300.00,
                'currency' => 'USD',
                'status' => 'available',
                'is_published' => true,
                'is_featured' => true,
                'sort_order' => 4,
                'published_at' => now(),
                'created_by' => $admin->id,
                'updated_by' => $admin->id,
            ],
        ];

        foreach ($motorbikes as $motorbikeData) {
            Motorbike::updateOrCreate(
                ['slug' => $motorbikeData['slug']],
                $motorbikeData
            );
        }

        $this->command->info('Motorbikes seeded successfully!');
    }
}
