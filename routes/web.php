<?php

use App\Http\Controllers\ShortUrl\ShortUrlController;
use App\Http\Controllers\ShortUrl\ShortUrlDestinationController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/short_url', [ShortUrlController::class, 'create'])->middleware(['auth', 'verified']);
Route::get('/short_urls', [ShortUrlController::class, 'index'])->middleware(['auth', 'verified']);
Route::post('/short_urls', [ShortUrlController::class, 'store'])->middleware(['auth', 'verified'])->name('short_url.store');

Route::get('/go/{slug}', [ShortUrlDestinationController::class, 'index']);

require __DIR__.'/auth.php';
