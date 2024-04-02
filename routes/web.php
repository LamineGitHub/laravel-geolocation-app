<?php

use App\Http\Controllers\AvoirController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PromoteurController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\TerrainController;
use App\Http\Controllers\ZoneController;
use Illuminate\Support\Facades\Route;

//use App\Http\Controllers\PromoteurController ;

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


Route::middleware('auth')->group(function () {
    Route::redirect('/', 'region');

    Route::get('region/search', [RegionController::class, 'search'])->name('region.search');
    Route::get('promoteur/search', [PromoteurController::class, 'search'])->name('promoteur.search');
    Route::get('zone/search', [ZoneController::class, 'search'])->name('zone.search');

    Route::resource('region', RegionController::class);
    Route::resource('promoteur', PromoteurController::class);
    Route::resource('zone', ZoneController::class);
    Route::resource('terrain', TerrainController::class);
    Route::resource('avoir', AvoirController::class);
});

//Route::get('/', static function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
