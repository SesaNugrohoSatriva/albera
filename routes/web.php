<?php

use App\Http\Controllers\Admin\ArticleController as AdminArticleController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicSiteController;
use App\Models\Article;
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

Route::middleware('set.locale')->group(function () {
    Route::get('/', [PublicSiteController::class, 'index'])->name('home');
    Route::get('/tentang-kami', [PublicSiteController::class, 'about'])->name('about');
    Route::get('/visi-misi', [PublicSiteController::class, 'visionMission'])->name('vision-mission');
    Route::get('/produk', [PublicSiteController::class, 'products'])->name('products.index');
    Route::get('/direksi', [PublicSiteController::class, 'directors'])->name('directors.index');
    Route::get('/artikel', [PublicSiteController::class, 'articles'])->name('articles.index');
    Route::get('/kontak', [PublicSiteController::class, 'contact'])->name('contact');
    Route::get('/produk/{product:slug}', [PublicSiteController::class, 'product'])->name('products.show');
    Route::get('/artikel/{article:slug}', [PublicSiteController::class, 'article'])->name('articles.show');

    Route::get('/media/{path}', function (string $path) {
        $disk = Storage::disk('public');

        abort_unless($disk->exists($path), 404);

        return response($disk->get($path), 200, [
            'Content-Type' => $disk->mimeType($path),
            'Cache-Control' => 'public, max-age=31536000',
        ]);
    })->where('path', '.*')->name('media');
});

Route::get('/dashboard', function () {
    return redirect()->route('admin.dashboard');
})->middleware('auth')->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/', fn () => view('admin.dashboard', [
        'productCount' => Product::count(),
        'articleCount' => Article::count(),
    ]))->name('dashboard');
    Route::resource('products', AdminProductController::class)->except('show');
    Route::resource('articles', AdminArticleController::class)->except('show');
});

require __DIR__.'/auth.php';
