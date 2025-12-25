<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ApartmentController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SeoController;
use App\Http\Controllers\PageController;

// Homepage
Route::get('/', [HomeController::class, 'index'])->name('home');

// Apartments (listing + one sample detail page using static view)
Route::get('/apartments', [ApartmentController::class, 'index'])->name('apartments.index');
Route::get('/apartments/sample-detail', [ApartmentController::class, 'show'])->name('apartments.show');

// Blog (dynamic listing + detail pages)
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::post('/blog/filter', [BlogController::class, 'filter'])->name('blog.filter');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');

// Contact
Route::get('/contact', [ContactController::class, 'index'])->name('contact');

// SEO pages
Route::get('/phu-quoc-long-term-rentals', [SeoController::class, 'longTerm'])->name('seo.long-term-rentals');
Route::get('/phu-quoc-monthly-rentals', [SeoController::class, 'monthly'])->name('seo.monthly-rentals');
Route::get('/phu-quoc-apartments-for-rent', [SeoController::class, 'apartmentsForRent'])->name('seo.phu-quoc-apartments-for-rent');

// Generic CMS pages (tạo page riêng trong admin rồi truy cập /pages/{slug})
Route::get('/pages/{slug}', [PageController::class, 'show'])->name('pages.show');


