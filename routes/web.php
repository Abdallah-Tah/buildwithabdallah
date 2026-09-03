<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\CaseStudyController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\SocialOAuthController;
use App\Http\Controllers\TutorialController;
use App\Http\Controllers\VideoController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');
Route::get('/sitemap.xml', SitemapController::class)->name('sitemap');
Route::get('/about', AboutController::class)->name('about');
Route::get('/services', ServiceController::class)->name('services');
Route::view('/government', 'pages.government')->name('government');
Route::view('/government/capability-statement', 'pages.capability-statement')->name('government.capability-statement');
Route::view('/manufacturing', 'pages.manufacturing')->name('manufacturing');
Route::get('/work/{caseStudy}', CaseStudyController::class)
    ->whereIn('caseStudy', array_keys(config('case-studies')))
    ->name('case-studies.show');
Route::get('/tutorials', [TutorialController::class, 'index'])->name('tutorials.index');
Route::get('/tutorials/{post:slug}', [TutorialController::class, 'show'])->name('tutorials.show');
Route::get('/videos', [VideoController::class, 'index'])->name('videos.index');
Route::get('/videos/{video:slug}', [VideoController::class, 'show'])->name('videos.show');
Route::get('/newsletter', [NewsletterController::class, 'index'])->name('newsletter.index');
Route::post('/newsletter', [NewsletterController::class, 'store'])->name('newsletter.store');
Route::get('/newsletter/unsubscribe/{token}', [NewsletterController::class, 'unsubscribe'])->name('newsletter.unsubscribe');
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::view('/status', 'pages.status')->name('status');
Route::view('/privacy', 'pages.privacy')->name('privacy');
Route::view('/terms', 'pages.terms')->name('terms');

// Social OAuth (LinkedIn, Facebook, Gumroad) — authorization-code flow.
Route::get('/auth/{provider}', [SocialOAuthController::class, 'redirect'])
    ->whereIn('provider', ['linkedin', 'facebook', 'gumroad'])->name('social.redirect');
Route::get('/auth/{provider}/callback', [SocialOAuthController::class, 'callback'])
    ->whereIn('provider', ['linkedin', 'facebook', 'gumroad'])->name('social.callback');
Route::get('/auth/{provider}/status', [SocialOAuthController::class, 'status'])
    ->whereIn('provider', ['linkedin', 'facebook', 'gumroad'])->name('social.status');
