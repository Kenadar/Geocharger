<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Geodata;
use App\Models\Booking;
use App\Http\Controllers\BookingController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/geodata', function (Request $request){
    Geodata::create([
        'name' => $request->get('name'),
        'latitude' => $request->get('latitude'),
        'longitude' => $request->get('longitude')
    ]);
});

Route::get('/booking',  [BookingController::class, 'store'] );
