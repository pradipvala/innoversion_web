<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Http\Request;


// Page Routes
Route::get('/', [HomeController::class, 'home'])->name('frontend.home');
Route::get('/home', [HomeController::class, 'home'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/company-overview', [HomeController::class, 'companyOverview'])->name('company.overview');
Route::get('/our-process', [HomeController::class, 'ourProcess'])->name('our.process');
Route::get('/life-at-company', [HomeController::class, 'lifeAtCompany'])->name('life.at.company');
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
Route::get('/terms-and-conditions', [HomeController::class, 'termsAndConditions'])->name('terms-and-conditions');
Route::get('/privacy-policy', [HomeController::class, 'privacyPolicy'])->name('privacy-policy');
Route::get('/technology/{slug}', [HomeController::class, 'technologyDetails'])->name('technology.details');
Route::get('/service/{slug}', [HomeController::class, 'serviceDetails'])->name('service.details');
Route::get('/industry/{slug}', [HomeController::class, 'industryDetails'])->name('industry.details');
Route::get('/expertise/{slug}', [HomeController::class, 'expertiseDetails'])->name('expertise.details');
Route::get('/auto-pulse', [HomeController::class, 'autoPulse'])->name('auto.pulse');

// // Contact Form Routes
Route::get('/contact', [HomeController::class, 'showContact'])->name('contact');
Route::post('/contact', [HomeController::class, 'submitContact'])->name('contact.submit');
Route::post('/newsletter-subscribe', [HomeController::class, 'submitNewsletter'])->name('newsletter.subscribe');
Route::get('/newsletter-unsubscribe/{email}', [HomeController::class, 'unsubscribeNewsletter'])
    ->middleware('signed')
    ->name('newsletter.unsubscribe');
Route::get('/csrf-token', function (Request $request) {
    $request->session()->regenerateToken();

    return response()->json([
        'token' => csrf_token(),
    ]);
})->name('csrf.token');
Route::post('/company-profile/download-request', [HomeController::class, 'submitCompanyProfileDownload'])->name('company.profile.download.request');
Route::post('/save/contact/us', [HomeController::class, 'submitCompanyProfileDownload'])->name('save.contact.us');

// Recruitment Routes
Route::post('/recruitment/apply', [HomeController::class, 'submitRecruitmentApplication'])->name('recruitment.apply');

Route::fallback([HomeController::class, 'handle404'])->name('404');



require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
