<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Apartment;
use App\Models\Option;
use App\Services\ApartmentService;

class HomeController extends Controller
{
    public function __construct(
        protected ApartmentService $apartmentService
    ) {
    }

    public function index()
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
        $agentPhotoOption = Option::get('contact_agent_photo', '');
        $agentPhoto = $agentPhotoOption ? asset('storage/' . $agentPhotoOption) : '';

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
}


