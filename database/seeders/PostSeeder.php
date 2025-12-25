<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
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

        $posts = [
            [
                'title' => 'Why Sunset Town is the Best Place for Long-Term Rentals in 2024',
                'slug' => 'why-sunset-town-long-term-rentals-2024',
                'excerpt' => 'Sunset Town isn\'t just a tourist attraction anymore. With new infrastructure, high-speed internet, and stunning Mediterranean architecture, it\'s becoming the top choice for expats and digital nomads.',
                'content' => '<p class="lead text-xl md:text-2xl text-gray-600 dark:text-gray-300 leading-relaxed mb-8">
                    Sunset Town (Thị Trấn Hoàng Hôn) in southern Phu Quoc isn\'t just a tourist attraction anymore. With new infrastructure, high-speed internet, and stunning Mediterranean architecture, it\'s rapidly becoming the top choice for expats and digital nomads looking for a unique island lifestyle.
                </p>
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mt-10 mb-4">The Mediterranean Vibe in Vietnam</h2>
                <p class="text-gray-600 dark:text-gray-400 mb-6">
                    Walking through the streets of Sunset Town feels like stepping into an Italian coastal village. The developers have meticulously recreated the Amalfi Coast aesthetic, complete with vibrant terracotta roofs, cobblestone pathways, and cascading bougainvillea. For long-term residents, this offers a unique psychological benefit: the feeling of living in a curated, beautiful environment that inspires creativity. Unlike the sometimes chaotic streets of Duong Dong, Sunset Town is pedestrian-friendly, quiet, and impeccably clean.
                </p>
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mt-10 mb-4">Infrastructure Built for Modern Living</h2>
                <p class="text-gray-600 dark:text-gray-400 mb-6">
                    One of the biggest concerns for remote workers moving to islands is connectivity. Sunset Town was built recently with modern infrastructure in mind. Fiber optic internet is standard in almost every apartment building, and speeds are reliably high—often exceeding 100Mbps.
                </p>
                <h3 class="text-xl font-bold text-gray-900 dark:text-white mt-8 mb-3">Accommodation Options</h3>
                <p class="text-gray-600 dark:text-gray-400 mb-6">
                    The rental market here is shifting from short-term vacation stays to accommodating 6-12 month leases. You can find high-end studio apartments with ocean views starting from as low as $400 USD per month. These units often come fully furnished with modern appliances, smart TVs, and kitchenettes, making the move-in process seamless.
                </p>
                <p class="text-gray-600 dark:text-gray-400 mb-6">
                    Additionally, many buildings offer amenities such as gyms, infinity pools, and 24/7 security, providing a level of comfort and safety that is hard to match elsewhere on the island at this price point.
                </p>
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mt-10 mb-4">Community and Lifestyle</h2>
                <p class="text-gray-600 dark:text-gray-400 mb-6">
                    While it started as a tourist destination, a real community is forming. The "Kiss Bridge" and the nightly fireworks show are spectacular, but the local life is found in the small expat meetups at the hillside bars and the growing number of western-style restaurants. It is quieter than the main tourist drag, which appeals to those who want to focus on work during the day and relax with a glass of wine by the harbor at sunset.
                </p>
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mt-10 mb-4">Conclusion</h2>
                <p class="text-gray-600 dark:text-gray-400 mb-6">
                    If you are looking for a blend of European charm and Vietnamese island life, Sunset Town is currently the best value proposition in Phu Quoc. The combination of modern housing, reliable internet, and stunning aesthetics makes it a top contender for your next long-term home base.
                </p>',
                'category' => 'apartment-hunting',
                'reading_time' => 5,
                'is_featured' => true,
                'is_published' => true,
                'published_at' => now()->subDays(60),
                'meta_title' => 'Why Sunset Town is the Best Place for Long-Term Rentals in 2024 - PQ Rentals',
                'meta_description' => 'Discover why Sunset Town in Phu Quoc is becoming the top choice for expats and digital nomads. Learn about modern infrastructure, rental options, and the Mediterranean-inspired lifestyle.',
                'focus_keyword' => 'Sunset Town long term rentals',
                'views' => 1250,
                'likes' => 45,
                'tags' => ['Sunset Town', 'Phú Quốc', 'Long Term Rental', 'Digital Nomad', 'Apartment Hunting'],
            ],
            [
                'title' => 'Top 5 Luxury Apartments with Ocean Views',
                'slug' => 'top-5-luxury-apartments-ocean-views',
                'excerpt' => 'Looking for that perfect morning view? We\'ve curated a list of the most stunning high-rise apartments available for rent right now.',
                'content' => '<p class="text-gray-600 dark:text-gray-400 mb-6">
                    Phu Quoc offers some of the most breathtaking ocean views in Vietnam. From high-rise condos to beachfront villas, here are our top picks for luxury apartments with stunning ocean vistas.
                </p>
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mt-10 mb-4">1. Sunset Town 18th Floor Penthouse</h2>
                <p class="text-gray-600 dark:text-gray-400 mb-6">
                    This stunning penthouse offers 360-degree views of the ocean and the entire Sunset Town complex. With floor-to-ceiling windows and a private rooftop terrace, this is the ultimate luxury experience.
                </p>
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mt-10 mb-4">2. An Thoi Beachfront Condo</h2>
                <p class="text-gray-600 dark:text-gray-400 mb-6">
                    Located directly on the beach, this modern condo offers uninterrupted ocean views from every room. Wake up to the sound of waves and enjoy sunset cocktails on your private balcony.
                </p>',
                'category' => 'apartment-hunting',
                'reading_time' => 3,
                'is_featured' => false,
                'is_published' => true,
                'published_at' => now()->subDays(45),
                'meta_title' => 'Top 5 Luxury Apartments with Ocean Views in Phu Quoc',
                'meta_description' => 'Discover the most stunning high-rise apartments with ocean views available for rent in Phu Quoc. From penthouses to beachfront condos.',
                'focus_keyword' => 'luxury apartments ocean views Phu Quoc',
                'views' => 890,
                'likes' => 32,
                'tags' => ['Luxury Apartments', 'Ocean Views', 'Phú Quốc', 'Apartment Hunting'],
            ],
            [
                'title' => 'Best Local Markets for Fresh Produce',
                'slug' => 'best-local-markets-fresh-produce',
                'excerpt' => 'Skip the supermarket and shop like a local. Here is our guide to the freshest seafood, fruits, and vegetables in Duong Dong market.',
                'content' => '<p class="text-gray-600 dark:text-gray-400 mb-6">
                    One of the best parts of living in Phu Quoc is access to incredibly fresh, local produce. From early morning fish markets to bustling fruit stalls, here\'s where to find the best ingredients.
                </p>
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mt-10 mb-4">Duong Dong Market</h2>
                <p class="text-gray-600 dark:text-gray-400 mb-6">
                    The largest and most popular market on the island. Arrive early (before 7 AM) for the freshest seafood. You\'ll find everything from live crabs to just-caught fish, plus an incredible variety of tropical fruits.
                </p>
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mt-10 mb-4">An Thoi Night Market</h2>
                <p class="text-gray-600 dark:text-gray-400 mb-6">
                    Perfect for evening shopping, this market comes alive after sunset. Great for street food, fresh vegetables, and local specialties.
                </p>',
                'category' => 'local-life',
                'reading_time' => 6,
                'is_featured' => false,
                'is_published' => true,
                'published_at' => now()->subDays(30),
                'meta_title' => 'Best Local Markets for Fresh Produce in Phu Quoc',
                'meta_description' => 'Discover where to buy the freshest seafood, fruits, and vegetables in Phu Quoc. A guide to the best local markets for expats and long-term residents.',
                'focus_keyword' => 'local markets Phu Quoc fresh produce',
                'views' => 650,
                'likes' => 28,
                'tags' => ['Local Life', 'Markets', 'Phú Quốc', 'Fresh Produce', 'Duong Dong'],
            ],
            [
                'title' => 'Renting a Motorbike: Safety & Legal Tips',
                'slug' => 'renting-motorbike-safety-legal-tips',
                'excerpt' => 'Driving in Vietnam can be chaotic. Learn about the necessary licenses, rental costs, and safety tips before you hit the road.',
                'content' => '<p class="text-gray-600 dark:text-gray-400 mb-6">
                    Renting a motorbike is one of the best ways to explore Phu Quoc, but it\'s important to understand the legal requirements and safety considerations first.
                </p>
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mt-10 mb-4">Required Documents</h2>
                <p class="text-gray-600 dark:text-gray-400 mb-6">
                    You\'ll need a valid Vietnamese driver\'s license or an International Driving Permit (IDP) with a motorcycle endorsement. Many rental shops will rent without proper documentation, but this puts you at risk of fines and insurance issues.
                </p>
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mt-10 mb-4">Safety Tips</h2>
                <p class="text-gray-600 dark:text-gray-400 mb-6">
                    Always wear a helmet (it\'s the law), drive defensively, and avoid driving at night if possible. The roads can be unpredictable with sudden potholes, animals, and other vehicles.
                </p>',
                'category' => 'travel-tips',
                'reading_time' => 4,
                'is_featured' => false,
                'is_published' => true,
                'published_at' => now()->subDays(20),
                'meta_title' => 'Renting a Motorbike in Phu Quoc: Safety & Legal Tips',
                'meta_description' => 'Everything you need to know about renting a motorbike in Phu Quoc. Legal requirements, safety tips, and rental costs for expats and tourists.',
                'focus_keyword' => 'motorbike rental Phu Quoc safety',
                'views' => 520,
                'likes' => 18,
                'tags' => ['Transport', 'Travel Tips', 'Phú Quốc', 'Motorbike'],
            ],
            [
                'title' => 'The Ultimate Weekend Itinerary for Visitors',
                'slug' => 'ultimate-weekend-itinerary-visitors',
                'excerpt' => 'Friends visiting? Here is the perfect 3-day plan covering the Cable Car, Starfish Beach, and the best night markets.',
                'content' => '<p class="text-gray-600 dark:text-gray-400 mb-6">
                    Planning a weekend trip to Phu Quoc? Here\'s the perfect itinerary to make the most of your time on the island.
                </p>
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mt-10 mb-4">Day 1: North Island Exploration</h2>
                <p class="text-gray-600 dark:text-gray-400 mb-6">
                    Start with the Hon Thom Cable Car for stunning views, then head to Starfish Beach for lunch and relaxation. End the day at Duong Dong Night Market for dinner.
                </p>
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mt-10 mb-4">Day 2: South Island & Beaches</h2>
                <p class="text-gray-600 dark:text-gray-400 mb-6">
                    Visit Sao Beach in the morning, explore the Phu Quoc Prison historical site, then enjoy sunset at Sunset Town with the nightly fireworks show.
                </p>',
                'category' => 'travel-tips',
                'reading_time' => 7,
                'is_featured' => false,
                'is_published' => true,
                'published_at' => now()->subDays(15),
                'meta_title' => 'The Ultimate Weekend Itinerary for Phu Quoc Visitors',
                'meta_description' => 'Perfect 3-day itinerary for visiting Phu Quoc. Includes Cable Car, beaches, night markets, and must-see attractions.',
                'focus_keyword' => 'Phu Quoc weekend itinerary',
                'views' => 780,
                'likes' => 35,
                'tags' => ['Travel Guide', 'Travel Tips', 'Phú Quốc', 'Itinerary'],
            ],
            [
                'title' => 'Understanding Rental Contracts in Vietnam',
                'slug' => 'understanding-rental-contracts-vietnam',
                'excerpt' => 'Don\'t get caught out by hidden clauses. We explain the standard terms for deposits, utility bills, and lease extensions.',
                'content' => '<p class="text-gray-600 dark:text-gray-400 mb-6">
                    Renting in Vietnam can be very different from what you\'re used to. Understanding the standard contract terms will help you avoid surprises and negotiate better deals.
                </p>
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mt-10 mb-4">Deposits</h2>
                <p class="text-gray-600 dark:text-gray-400 mb-6">
                    Standard practice is 1-2 months\' rent as a deposit. Make sure the contract clearly states the conditions for deposit return and any deductions that might be made.
                </p>
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mt-10 mb-4">Utility Bills</h2>
                <p class="text-gray-600 dark:text-gray-400 mb-6">
                    Utilities are typically paid separately. Some landlords include them in the rent, but this is less common. Always clarify who pays for electricity, water, and internet.
                </p>',
                'category' => 'legal-visa',
                'reading_time' => 5,
                'is_featured' => false,
                'is_published' => true,
                'published_at' => now()->subDays(10),
                'meta_title' => 'Understanding Rental Contracts in Vietnam: A Guide for Expats',
                'meta_description' => 'Learn about standard rental contract terms in Vietnam. Deposits, utility bills, lease extensions, and what to watch out for.',
                'focus_keyword' => 'rental contracts Vietnam expats',
                'views' => 420,
                'likes' => 15,
                'tags' => ['Legal', 'Phú Quốc', 'Rental Contracts', 'Expats'],
            ],
            [
                'title' => 'Digital Nomad Friendly Cafes in Phu Quoc',
                'slug' => 'digital-nomad-friendly-cafes-phu-quoc',
                'excerpt' => 'Need strong WiFi and great coffee? Here are the best spots to work remotely from, with AC and power outlets included.',
                'content' => '<p class="text-gray-600 dark:text-gray-400 mb-6">
                    Working remotely from Phu Quoc? These cafes offer the perfect combination of strong WiFi, comfortable seating, and great coffee to keep you productive.
                </p>
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mt-10 mb-4">1. The Workshop Coffee</h2>
                <p class="text-gray-600 dark:text-gray-400 mb-6">
                    Located in Duong Dong, this modern cafe offers fast WiFi, plenty of power outlets, and air conditioning. The coffee is excellent and they have a quiet upstairs area perfect for focused work.
                </p>
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mt-10 mb-4">2. Sunset Town Coffee House</h2>
                <p class="text-gray-600 dark:text-gray-400 mb-6">
                    With ocean views and reliable internet, this is a favorite among digital nomads. The atmosphere is relaxed and they\'re very welcoming to people working on laptops.
                </p>',
                'category' => 'local-life',
                'reading_time' => 4,
                'is_featured' => false,
                'is_published' => true,
                'published_at' => now()->subDays(5),
                'meta_title' => 'Digital Nomad Friendly Cafes in Phu Quoc',
                'meta_description' => 'Best cafes in Phu Quoc for remote work. Strong WiFi, power outlets, AC, and great coffee for digital nomads.',
                'focus_keyword' => 'digital nomad cafes Phu Quoc',
                'views' => 680,
                'likes' => 42,
                'tags' => ['Lifestyle', 'Digital Nomad', 'Phú Quốc', 'Cafes', 'Remote Work'],
            ],
        ];

        foreach ($posts as $postData) {
            $tags = $postData['tags'];
            unset($postData['tags']);

            // Check if post already exists
            $post = Post::firstOrCreate(
                ['slug' => $postData['slug']],
                array_merge($postData, [
                    'author_id' => $admin->id,
                ])
            );

            // Attach tags with type 'blog_tags' (sync will update if exists)
            $post->syncTagsWithType($tags, 'blog_tags');
        }
    }
}

