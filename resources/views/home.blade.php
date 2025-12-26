@extends('layouts.app')

@section('title', 'Phu Quoc Apartment Rentals')

@push('styles')
    @include('home.partials.styles')
@endpush

@section('content')
    @include('home.partials.hero-section')
    @include('home.partials.apartments-section')
    @include('home.partials.motorbike-section')
    @include('home.partials.blog-section')
    @include('home.partials.about-section')
    @include('home.partials.testimonials-gallery-section')
    @include('home.partials.contact-section')
@endsection

@push('scripts')
    @include('home.partials.scripts')
@endpush
