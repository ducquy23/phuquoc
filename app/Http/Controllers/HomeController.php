<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Apartment;
use App\Models\Option;
use App\Services\ApartmentService;
use Awcodes\Curator\Models\Media;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{

    /**
     * @param ApartmentService $apartmentService
     */
    public function __construct(
        protected ApartmentService $apartmentService
    ) {}

    /**
     * @return Factory|View
     */
    public function index(): Factory|View
    {
        $latestPosts = Post::where('is_published', true)
            ->with('author')
            ->orderBy('published_at', 'desc')
            ->limit(6)
            ->get();

        // Get latest apartments (limit 6)
        $apartments = Apartment::where('is_published', true)
            ->where('status', 'available')
            ->orderBy('published_at', 'desc')
            ->limit(6)
            ->get();

        // Agent / home about options
        $homeAvatarOption = Option::get('home_about_avatar', '');
        $agentPhotoOption = Option::get('contact_agent_photo', '');

        $avatarOption = !empty($homeAvatarOption) ? $homeAvatarOption : $agentPhotoOption;
        $agentPhoto = $this->getAgentPhotoUrl($avatarOption);

        $options = [
            'agent_name' => Option::get('contact_agent_name', 'Vu Van Hai'),
            'agent_title' => Option::get('contact_agent_title', 'Your friendly neighborhood buddy'),
            'agent_bio' => Option::get('contact_agent_bio', ''),
            'agent_photo' => $agentPhoto,
        ];

        $homeAboutHeading = Option::get('home_about_heading', 'About Me');
        $homeAboutIntro = Option::get('home_about_intro', '');
        $homeAboutDetails = Option::get('home_about_details', '');

        $homeTestimonials = json_decode(Option::get('home_testimonials', '[]'), true) ?? [];
        $homeGalleryImages = json_decode(Option::get('home_gallery_images', '[]'), true) ?? [];

        return view('home', [
            'latestPosts' => $latestPosts,
            'apartments' => $apartments,
            'options' => $options,
            'homeAboutHeading' => $homeAboutHeading,
            'homeAboutIntro' => $homeAboutIntro,
            'homeAboutDetails' => $homeAboutDetails,
            'homeTestimonials' => $homeTestimonials,
            'homeGalleryImages' => $homeGalleryImages,
        ]);
    }

    /**
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

        // Otherwise, treat as storage path (relative to storage/app/public)
        return asset('storage/' . $path);
    }
}


