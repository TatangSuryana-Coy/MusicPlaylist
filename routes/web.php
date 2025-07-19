<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ThemeController;
use App\Http\Controllers\MusicController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Semua route utama aplikasi didefinisikan di sini.
| Gunakan middleware dan penamaan route untuk keamanan dan kemudahan.
*/

// -------------------------
// Halaman utama (landing)
// -------------------------
Route::view('/', 'welcome');

// -------------------------
// Dashboard & Profile (user login)
// -------------------------
Route::middleware(['auth'])->group(function () {
    // Dashboard (hanya user terverifikasi)
    Route::view('dashboard', 'dashboard')->middleware('verified')->name('dashboard');
    // Profile klasik
    Route::view('profile', 'profile')->name('profile');

    // Playlist musik
    Route::get('/music', [MusicController::class, 'index'])->name('music.playlist');
    Route::post('/music/upload', [MusicController::class, 'upload'])->name('music.upload');

    // Pengaturan tema user
    Route::get('/settings/theme', [ThemeController::class, 'edit'])->name('settings.theme');
    Route::post('/settings/theme', [ThemeController::class, 'update'])->name('settings.theme.update');

    // API toggle dark mode (AJAX)
    Route::post('/user/dark-mode', function (Illuminate\Http\Request $request) {
        $request->validate(['dark_mode' => 'required|boolean']);
        $user = auth()->user();
        $user->dark_mode = $request->dark_mode;
        $user->save();
        return response()->json(['success' => true]);
    });
});

// -------------------------
// Route auth bawaan Laravel
// -------------------------
require __DIR__.'/auth.php';

// (Opsional) Tambahkan route lain di bawah sini jika diperlukan
