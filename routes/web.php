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

Route::get('/catalog/', [PagesController::class, 'catalog'] )->name('catalog');

Route::get('/catalog/{author}/{name}', [PagesController::class, 'info'] );

Route::get('/search/', [PagesController::class,'search']);

Route::get('/catalog/{author}/{name}/characteristic', [PagesController::class,'characteristic']);

Route::get('/catalog/{author}/{name}/author', [PagesController::class,'author']);

Route::get('/catalog/{author}/{name}/author/books', [PagesController::class,'author_books']);

Route::get('/login/', function () {
    return view('pages.login');
})->name('login');

Route::post('/login/wws', 'PagesController@login')->name('signin');

Route::get('/register/', function () {
    return view('pages.registration');
})->name('register');
//Route::get('/register/', function(){return view('pages.registration');} );
Route::post('/register/wws', 'PagesController@register')->name('signup');
Route::post('/welcome/', [PagesController::class,'index'])->name("index");

//Route::get('/aboba/', 'CatalogController@how');



