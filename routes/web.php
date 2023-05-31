<?php

use App\Http\Controllers\Admin\DeveloperController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\GameController;
use App\Http\Controllers\Admin\PegiController;
use Illuminate\Support\Facades\Route;
use PHPUnit\Framework\RiskyTestError;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

// Route::resource('games', GameController::class);

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {

    Route::resource('games', GameController::class);
    Route::resource('developers', DeveloperController::class);

    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::resource('pegis', PegiController::class);

    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
