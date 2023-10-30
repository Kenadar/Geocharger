<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Geodata;
use App\Http\Controllers\GeodataController;
use Illuminate\Http\Request;
use App\Models\Dayparting;
use App\Http\Controllers\BookingController;
use App\Models\Price;
use App\Http\Controllers\PriceController;
use App\Http\Controllers\DashboardController;
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

Route::get('/dashboard',[DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/dashboard/geo/info', [DashboardController::class, 'geoInfo'])->name('geodata.info');
Route::get('/dashboard/geo/dayparting', [DashboardController::class, 'geoDayparting'])->name('geodata.dayparting');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::get('/geodata', [GeodataController::class, 'index'])->middleware(['auth', 'verified'])->name('geodata');
Route::get('/geodata/list', [GeodataController::class, 'index'])->name('geodata.list');

Route::get('/geodata/edit/{id}', [GeodataController::class, 'edit'])->name('geodata.edit');
Route::post('/geodata/edit/{id}', [GeodataController::class, 'updateById'])->name('geodata.update');

Route::get('/geodata/delete/{id}', [GeodataController::class,'deleteById']);

Route::get('/geodata/create/create', [GeodataController::class, 'create'])->name('geodata.create');
Route::post('/geodata/create/create',[GeodataController::class, 'store'])->name('geodata.create');

Route::get('/booking', [BookingController::class, 'index'])->name('booking');
Route::post('/booking', [BookingController::class, 'store'])->name('booking');

Route::get('/price', [PriceController::class, 'index'])->name('price');
Route::get('/price/create', [PriceController::class, 'store'])->name('price.create');