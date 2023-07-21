<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Geodata;
use App\Http\Controllers\GeodataController;
use Illuminate\Http\Request;
use App\Models\Dayparting;
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
    $geodata = Geodata::all();

    return view('geodata/geodata', ['geodatas' => $geodata]);
})->middleware(['auth', 'verified'])->name('geodata');

Route::get('/geodata/list', function () {
    $geodata = Geodata::all();

    return view('geodata/geodata', ['geodatas' => $geodata]);
})->name('geodata.list');

Route::get('/geodata/delete/{id}', function($id){
    $deleteDayparting = Dayparting::deleteById($id);

    $deleteById = Geodata::deleteById($id);
    return redirect('/geodata/list');
});

Route::get('/geodata/edit/{id}', function($id){

    $geodata = Geodata::find($id);
    return view("geodata/edit", ['geodata' => $geodata]);
})->name('geodata.edit');

Route::post('/geodata/edit/{id}', function(Request $request, $id){
    $params=[
        'name' => $request->get('name'),
        'latitude' => $request->get('latitude'),
        'longitude' => $request->get('longitude'),
        'dayparting' => $request->get('dayparting')
    ];

    $geodata= Geodata::find($id);
    Geodata::updateById($params, $id);

    Dayparting::updateById($params, $id);

    return redirect('/geodata/list');
})->name('geodata.update');

Route::get('/geodata/create/create', function(){
    return view('geodata/create');
})->name('geodata.create');

Route::post('/geodata/create/create',[GeodataController::class, 'store'], function(){
  
})->name('geodata.create');