<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController;


// Page Routes
Route::get('/', [HomeController::class, 'home'])->name('frontend.home');
Route::get('/home', [HomeController::class, 'home'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/services', [HomeController::class, 'services'])->name('services');
Route::get('/single-service', [HomeController::class, 'singleServices'])->name('single.services');
Route::get('/blog', [HomeController::class, 'blog'])->name('blog');
Route::get('/single-blog', [HomeController::class, 'singleBlog'])->name('single.blog');
Route::get('/case-studies', [HomeController::class, 'caseStudies'])->name('case-studies');
Route::get('/team', [HomeController::class, 'team'])->name('team');
Route::get('/testimonials', [HomeController::class, 'testimonials'])->name('testimonials');
Route::get('/partnership', [HomeController::class, 'partnership'])->name('partnership');
Route::get('/open-positions', [HomeController::class, 'openPositions'])->name('open-positions');
Route::get('/projects', [HomeController::class, 'projects'])->name('projects');

// // Contact Form Routes
Route::get('/contact', [HomeController::class, 'showContact'])->name('contact');
Route::post('/contact', [HomeController::class, 'submitContact'])->name('contact.submit');

// Recruitment Routes
Route::post('/recruitment/apply', [HomeController::class, 'submitRecruitmentApplication'])->name('recruitment.apply');

Route::fallback([HomeController::class, 'handle404'])->name('404');



require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
