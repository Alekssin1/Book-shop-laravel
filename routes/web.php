<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;

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


Route::get('/', [PagesController::class, 'Landing']);

Route::get('/catalog/', [PagesController::class, 'catalog'] );

Route::get('/catalog/{author}/{name}', [PagesController::class, 'info'] );

Route::get('/search/', [PagesController::class,'search']);

Route::get('/login/', [PagesController::class,'login']);

Route::get('/register/', [PagesController::class,'register']);
Route::post('/register/', [PagesController::class,'register']);

Route::post('/welcome/', [PagesController::class,'index'])->name("index");



