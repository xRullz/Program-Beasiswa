<?php

use App\Http\Controllers\ApplicationsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ScholarshipsController;
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
// Auth
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

//Backend   
Route::get('/dashboard', [HomeController::class, 'index']);
Route::get('/users', [UsersController::class, 'index']);
Route::post('/users/store', [UsersController::class, 'store']);
Route::post('/users/{id}/update', [UsersController::class, 'update']);
Route::post('/users/{id}/destroy', [UsersController::class, 'destroy']);

Route::get('/scholarships', [ScholarshipsController::class, 'index']);
Route::post('/scholarships/store', [ScholarshipsController::class, 'store']);
Route::post('/scholarships/{id}/update', [ScholarshipsController::class, 'update']);
Route::post('/scholarships/{id}/destroy', [ScholarshipsController::class, 'destroy']);

Route::get('/applications', [ApplicationsController::class, 'index']);
Route::post('/applications/store', [ApplicationsController::class, 'store']);
Route::post('/applications/{id}/update', [ApplicationsController::class, 'update']);

Route::get('/contacts', [ContactsController::class, 'index']);

//Frontend
Route::get('/', [FrontendController::class, 'index']);

Route::post('/contacts/store', [ContactsController::class, 'store']);

Route::post('/applications/register', [ApplicationsController::class, 'register']);

