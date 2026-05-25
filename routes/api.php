<?php

use App\Http\Controllers\Api\V1\CategoryController;
use App\Http\Controllers\Api\V1\ContactMessageController;
use App\Http\Controllers\Api\V1\MediaController;
use App\Http\Controllers\Api\V1\PostController;
use App\Http\Controllers\Api\V1\PublicPostController;
use App\Http\Controllers\Api\V1\PublicVideoController;
use App\Http\Controllers\Api\V1\TagController;
use App\Http\Controllers\Api\V1\VideoController;
use Illuminate\Support\Facades\Route;

Route::get('/health-check', fn (): array => [
    'status' => 'ok',
    'app' => config('app.name'),
])->name('api.health-check');

Route::prefix('v1')
    ->middleware(['throttle:api-v1', 'force.json', 'api.log'])
    ->group(function (): void {
        Route::get('/public/posts', [PublicPostController::class, 'index'])->name('api.v1.public.posts.index');
        Route::get('/public/posts/{post:slug}', [PublicPostController::class, 'show'])->name('api.v1.public.posts.show');
        Route::get('/public/videos', [PublicVideoController::class, 'index'])->name('api.v1.public.videos.index');
        Route::get('/public/videos/{video:slug}', [PublicVideoController::class, 'show'])->name('api.v1.public.videos.show');
        Route::post('/contact', [ContactMessageController::class, 'store'])->name('api.v1.contact.store');

        Route::middleware('auth:sanctum')->group(function (): void {
            Route::get('/posts', [PostController::class, 'index'])->middleware('ability:admin:read')->name('api.v1.posts.index');
            Route::post('/posts', [PostController::class, 'store'])->middleware('ability:posts:create')->name('api.v1.posts.store');
            Route::get('/posts/{post}', [PostController::class, 'show'])->middleware('ability:admin:read')->name('api.v1.posts.show');
            Route::patch('/posts/{post}', [PostController::class, 'update'])->middleware('ability:posts:update')->name('api.v1.posts.update');
            Route::delete('/posts/{post}', [PostController::class, 'destroy'])->middleware('ability:posts:delete')->name('api.v1.posts.destroy');
            Route::post('/posts/{post}/publish', [PostController::class, 'publish'])->middleware('ability:posts:publish')->name('api.v1.posts.publish');
            Route::post('/posts/{post}/unpublish', [PostController::class, 'unpublish'])->middleware('ability:posts:publish')->name('api.v1.posts.unpublish');

            Route::get('/videos', [VideoController::class, 'index'])->middleware('ability:admin:read')->name('api.v1.videos.index');
            Route::post('/videos', [VideoController::class, 'store'])->middleware('ability:videos:create')->name('api.v1.videos.store');
            Route::get('/videos/{video}', [VideoController::class, 'show'])->middleware('ability:admin:read')->name('api.v1.videos.show');
            Route::patch('/videos/{video}', [VideoController::class, 'update'])->middleware('ability:videos:update')->name('api.v1.videos.update');
            Route::delete('/videos/{video}', [VideoController::class, 'destroy'])->middleware('ability:videos:delete')->name('api.v1.videos.destroy');
            Route::post('/videos/{video}/publish', [VideoController::class, 'publish'])->middleware('ability:videos:publish')->name('api.v1.videos.publish');
            Route::post('/videos/{video}/unpublish', [VideoController::class, 'unpublish'])->middleware('ability:videos:publish')->name('api.v1.videos.unpublish');

            Route::post('/media/upload', [MediaController::class, 'store'])->middleware('ability:media:upload')->name('api.v1.media.store');
            Route::get('/media', [MediaController::class, 'index'])->middleware('ability:admin:read')->name('api.v1.media.index');
            Route::delete('/media/{media}', [MediaController::class, 'destroy'])->middleware('ability:media:upload')->name('api.v1.media.destroy');

            Route::get('/categories', [CategoryController::class, 'index'])->middleware('ability:admin:read')->name('api.v1.categories.index');
            Route::post('/categories', [CategoryController::class, 'store'])->middleware('ability:posts:create,videos:create')->name('api.v1.categories.store');

            Route::get('/tags', [TagController::class, 'index'])->middleware('ability:admin:read')->name('api.v1.tags.index');
            Route::post('/tags', [TagController::class, 'store'])->middleware('ability:posts:create,videos:create')->name('api.v1.tags.store');

            Route::get('/contact-messages', [ContactMessageController::class, 'index'])->middleware('ability:admin:read')->name('api.v1.contact.index');
        });
    });
