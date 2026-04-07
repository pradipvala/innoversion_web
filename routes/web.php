<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

// Page Routes
Route::get('/', [PageController::class, 'home'])->name('frontend.home');
Route::get('/home', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/services', [PageController::class, 'services'])->name('services');
Route::get('/single-service', [PageController::class, 'singleServices'])->name('single.services');
Route::get('/blog', [PageController::class, 'blog'])->name('blog');
Route::get('/single-blog', [PageController::class, 'singleBlog'])->name('single.blog');
Route::get('/case-studies', [PageController::class, 'caseStudies'])->name('case-studies');
Route::get('/team', [PageController::class, 'team'])->name('team');
Route::get('/testimonials', [PageController::class, 'testimonials'])->name('testimonials');
Route::get('/partnership', [PageController::class, 'partnership'])->name('partnership');

// // Contact Form Routes
Route::get('/contact', [PageController::class, 'showContact'])->name('contact');

// Route::get('/',[HomeController::class,'home'])->name('frontend.home');


require __DIR__.'/auth.php';
require __DIR__.'/admin.php';