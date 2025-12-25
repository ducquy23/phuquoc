<?php

namespace Database\Seeders;

use App\Models\Option;
use Illuminate\Database\Seeder;

class ContactOptionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $options = [
            [
                'option_name' => 'contact_agent_name',
                'option_value' => 'Vu Van Hai',
                'description' => 'Agent name displayed on contact page',
            ],
            [
                'option_name' => 'contact_agent_title',
                'option_value' => 'Your friendly neighborhood buddy',
                'description' => 'Agent title/subtitle',
            ],
            [
                'option_name' => 'contact_agent_bio',
                'option_value' => 'As a local of Phu Quoc with over 6 years in real estate, I understand the local market and my clients\' needs. My experience in cities like Ho Chi Minh City has informed my perspective on investment trends. I also manage rental apartments with over 300 positive Airbnb reviews, giving me insights into appealing properties. With my local network, I\'m committed to helping you find a property that meets your goals. Contact me for guidance on the best options for Phu Quoc Apartments for Rent!',
                'description' => 'Agent bio/description',
            ],
            [
                'option_name' => 'contact_agent_photo',
                'option_value' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuDXqkOGQ2MHPaESBUQWOBF844hRoq2ENPpjICNXI91jzKJkuk6kmbPihysF8P2bxWEILNKD2Dp5AmaGXEA9ASBmVO63Y2SDjPM_MbDIVR6iJIKWu5tAZn4SVoJk5HHsd83xiFnLGxr5MwM_qhA9Am2FtOyhnVDNkn35-UvAe8M7dAHqJMIKQi-k3SPkC6OE_oKG7F0NCZpTG19SxBMk7BlqEeXfwWnNxCb7i3znERNpPZPnr8qU34BEdKg8yOfH6FqwjIuUp1kzBOkn',
                'description' => 'Agent photo URL',
            ],
            [
                'option_name' => 'contact_email',
                'option_value' => 'vnha231@gmail.com',
                'description' => 'Contact email address',
            ],
            [
                'option_name' => 'contact_phone',
                'option_value' => '+84 9024 07024',
                'description' => 'Contact phone number',
            ],
            [
                'option_name' => 'contact_location',
                'option_value' => 'Sunset Town, Phu Quoc, Vietnam',
                'description' => 'Office location',
            ],
            [
                'option_name' => 'contact_social_twitter',
                'option_value' => '#',
                'description' => 'Twitter profile URL (use # to hide)',
            ],
            [
                'option_name' => 'contact_social_facebook',
                'option_value' => '#',
                'description' => 'Facebook profile URL (use # to hide)',
            ],
            [
                'option_name' => 'contact_social_instagram',
                'option_value' => '#',
                'description' => 'Instagram profile URL (use # to hide)',
            ],
            [
                'option_name' => 'contact_office_hours_weekdays',
                'option_value' => '9:00 AM - 6:00 PM',
                'description' => 'Office hours for Monday-Friday',
            ],
            [
                'option_name' => 'contact_office_hours_saturday',
                'option_value' => '9:00 AM - 4:00 PM',
                'description' => 'Office hours for Saturday',
            ],
            [
                'option_name' => 'contact_office_hours_sunday',
                'option_value' => 'Closed',
                'description' => 'Office hours for Sunday',
            ],
        ];

        foreach ($options as $option) {
            Option::updateOrCreate(
                ['option_name' => $option['option_name']],
                [
                    'option_value' => $option['option_value'],
                    'description' => $option['description'],
                ]
            );
        }
    }
}
