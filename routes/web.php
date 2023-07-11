<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Geodata;
use App\Http\Controllers\GeodataController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::get('/geodata', function(){
    return view('geodata');
})->middleware(['auth', 'verified'])->name('geodata');

Route::get('/geodata/list', function () {

    $geodata = Geodata::all();

    return view('geodata/geodata', [
        'geodatas' => $geodata
    ]);
});
Route::get('/geodata/delete/{id}', function($id){
    $deleteById = Geodata::deleteById($id);

    return redirect('/geodata/list');
});
