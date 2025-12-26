<?php

namespace App\Services;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactService
{
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
