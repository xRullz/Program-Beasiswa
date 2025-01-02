<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

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
    return view('frontend.index', ['title' => 'Beasiswa PKN']);
});

//Backend   
Route::get('/dashboard', [HomeController::class, 'index']);
Route::get('/users', [UsersController::class, 'index']);
Route::post('/users/{id}/update', [UsersController::class, 'update']);
Route::post('/users/{id}/destroy', [UsersController::class, 'destroy']);