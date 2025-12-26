<?php

namespace App\Services;

use App\Models\Apartment;
use App\Models\Motorbike;
use App\Models\Option;
use App\Models\Post;
use Awcodes\Curator\Models\Media;

class HomeService
{
    public function __construct(
        protected ApartmentService $apartmentService,
        protected HeroFilterService $heroFilterService,
    ) {
    }

    /**
     * Build data for home page.
     *
     * @return array
     */
    public function getHomeData(): array
    {
        $latestPosts = Post::where('is_published', true)
            ->with('author')
            ->orderBy('published_at', 'desc')
            ->limit(6)
            ->get();

        $apartments = Apartment::where('is_published', true)
            ->where('status', 'available')
            ->orderBy('published_at', 'desc')
            ->limit(6)
            ->get();

        // Agent / home about options
        $homeAvatarOption = Option::get('home_about_avatar', '');
        $agentPhotoOption = Option::get('contact_agent_photo', '');

        // Use home avatar if available, otherwise fallback to contact avatar
        $avatarOption = !empty($homeAvatarOption) ? $homeAvatarOption : $agentPhotoOption;
        $agentPhoto = $this->getAgentPhotoUrl($avatarOption);

        $options = [
            'agent_name' => Option::get('contact_agent_name', ''),
            'agent_title' => Option::get('contact_agent_title', ''),
            'agent_bio' => Option::get('contact_agent_bio', ''),
            'agent_photo' => $agentPhoto,
        ];

        $homeAboutHeading = Option::get('home_about_heading', 'About Me');
        $homeAboutIntro = Option::get('home_about_intro', '');
        $homeAboutDetails = Option::get('home_about_details', '');

        $homeTestimonials = json_decode(Option::get('home_testimonials', '[]'), true) ?? [];
        $homeGalleryImages = json_decode(Option::get('home_gallery_images', '[]'), true) ?? [];

        // Contact information
        $contactInfo = [
            'email' => Option::get('contact_email', ''),
            'phone' => Option::get('contact_phone', ''),
            'zalo_whatsapp' => Option::get('contact_zalo_whatsapp', Option::get('contact_phone', '')),
        ];

        // Get price range for hero search
        $priceRange = Apartment::where('is_published', true)
            ->where('status', 'available')
            ->whereNotNull('price_monthly')
            ->selectRaw('MIN(price_monthly) as min_price, MAX(price_monthly) as max_price')
            ->first();

        // Get published motorbikes
        $motorbikes = Motorbike::published()
            ->available()
            ->ordered()
            ->get();

        return [
            'latestPosts' => $latestPosts,
            'apartments' => $apartments,
            'motorbikes' => $motorbikes,
            'options' => $options,
            'homeAboutHeading' => $homeAboutHeading,
            'homeAboutIntro' => $homeAboutIntro,
            'homeAboutDetails' => $homeAboutDetails,
            'homeTestimonials' => $homeTestimonials,
            'homeGalleryImages' => $homeGalleryImages,
            'contactInfo' => $contactInfo,
            'heroLocations' => $this->heroFilterService->getLocations(),
            'heroPropertyTypes' => $this->heroFilterService->getPropertyTypes(),
            'heroBeds' => $this->heroFilterService->getBeds(),
            'heroFeaturedApartment' => $this->heroFilterService->getFeaturedApartment(),
            'priceRange' => [
                'min' => $priceRange->min_price ?? 0,
                'max' => $priceRange->max_price ?? 2000,
            ],
        ];
    }

    /**
     * Resolve agent photo URL from option value.
     *
     * @param string $photoOption
     * @return string
     */
    private function getAgentPhotoUrl(string $photoOption): string
    {
        if (empty($photoOption)) {
            return asset('assets/images/Image-not-found.png');
        }

        // If numeric, might be Curator ID
        if (is_numeric($photoOption)) {
            try {
                $media = Media::find((int)$photoOption);
                if ($media && $media->url) {
                    return $media->url;
                }
            } catch (\Exception $e) {
            }
            return asset('assets/images/Image-not-found.png');
        }

        // If it's already a full URL
        if (filter_var($photoOption, FILTER_VALIDATE_URL) || str_starts_with($photoOption, 'http')) {
            return $photoOption;
        }

        // Check if path already starts with 'storage/' or 'public/'
        $path = ltrim($photoOption, '/');
        if (str_starts_with($path, 'storage/')) {
            return asset($path);
        }
        if (str_starts_with($path, 'public/')) {
            return asset(str_replace('public/', 'storage/', $path));
        }

        // Otherwise, treat as storage path
        return asset('storage/' . $path);
    }
}


