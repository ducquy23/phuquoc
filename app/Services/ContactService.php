<?php

namespace App\Services;

use App\Models\Contact;
use App\Models\Option;
use Awcodes\Curator\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactService
{
    /**
     * Get all contact page options.
     *
     * @return array
     */
    public function getContactOptions(): array
    {
        $agentPhotoOption = Option::get('contact_agent_photo', '');
        $agentPhoto = $this->getAgentPhotoUrl($agentPhotoOption);

        return [
            'agent_name' => Option::get('contact_agent_name', 'Vu Van Hai'),
            'agent_title' => Option::get('contact_agent_title', 'Your friendly neighborhood buddy'),
            'agent_bio' => Option::get('contact_agent_bio', 'As a local of Phu Quoc with over 6 years in real estate, I understand the local market and my clients\' needs. My experience in cities like Ho Chi Minh City has informed my perspective on investment trends. I also manage rental apartments with over 300 positive Airbnb reviews, giving me insights into appealing properties. With my local network, I\'m committed to helping you find a property that meets your goals. Contact me for guidance on the best options for Phu Quoc Apartments for Rent!'),
            'agent_photo' => $agentPhoto,
            'contact_email' => Option::get('contact_email', 'vnha231@gmail.com'),
            'contact_phone' => Option::get('contact_phone', '+84 9024 07024'),
            'contact_location' => Option::get('contact_location', 'Sunset Town, Phu Quoc, Vietnam'),
            'social_twitter' => Option::get('contact_social_twitter', '#'),
            'social_facebook' => Option::get('contact_social_facebook', '#'),
            'social_instagram' => Option::get('contact_social_instagram', '#'),
            'office_hours_weekdays' => Option::get('contact_office_hours_weekdays', '9:00 AM - 6:00 PM'),
            'office_hours_saturday' => Option::get('contact_office_hours_saturday', '9:00 AM - 4:00 PM'),
            'office_hours_sunday' => Option::get('contact_office_hours_sunday', 'Closed'),
        ];
    }

    /**
     * Get agent photo URL from option value.
     * If it's numeric, treat as Curator ID and get URL from Media model.
     * Otherwise, treat as direct URL.
     *
     * @param string $photoOption
     * @return string
     */
    public function getAgentPhotoUrl(string $photoOption): string
    {
        if (empty($photoOption)) {
            return asset('assets/images/Image-not-found.png');
        }

        if (is_numeric($photoOption)) {
            try {
                $media = Media::find((int)$photoOption);
                if ($media && $media->url) {
                    return $media->url;
                }
            } catch (\Exception $e) {
                // Fallback to default if error
            }
            return asset('assets/images/Image-not-found.png');
        }

        return $photoOption;
    }

    /**
     * Validate and store the contact form data.
     *
     * @param Request $request
     * @return string
     */
    public function storeContact(Request $request): string
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:255',
            'interest' => 'nullable|string|max:255',
            'message' => 'required|string|max:5000',
        ]);

        if ($validator->fails()) {
            return 'Validation failed';
        }

        // Create the contact record
        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone ?? null,
            'subject' => $request->interest ?? 'General Inquiry',
            'message' => $request->message,
            'inquiry_type' => $this->mapInterestToInquiryType($request->interest),
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'status' => 'new',
        ]);

        return 'Contact successfully saved';
    }

    /**
     * Map interest to inquiry type.
     *
     * @param string|null $interest
     * @return string
     */
    private function mapInterestToInquiryType(?string $interest): string
    {
        return match($interest) {
            'Long-term Rental Apartment' => 'long_term',
            'Short-term Holiday Stay' => 'short_term',
            'Motorbike Rental' => 'motorbike',
            default => 'general',
        };
    }
}
