<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DonorController;
use App\Http\Controllers\PlasmaController;


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
    return view('welcome');
});



Route::middleware(['auth:sanctum', 'verified'])->group(function(){
   Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');;
  });

 
  Route::resource('Donor', DonorController::class);
  Route::resource('Plasma', PlasmaController::class);
  
  Route::post('api/fetch-cities', [DonorController::class, 'fetchCity']);
  Route::post('search', [DonorController::class, 'search_text']);
  //Route::get('search', [DonorController::class, 'search_text']);
  Route::get('search_state', [DonorController::class, 'search_state']);
  Route::get('search_plasma', [PlasmaController::class, 'search_text']);
  Route::get('search_state_plasma', [PlasmaController::class, 'search_state']);
  Route::get('fetch-state', [DonorController::class, 'fetch_state']);