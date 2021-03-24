<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\AlbumController;

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

Route::get('artists', [ArtistController::class, 'create'])
    ->middleware(['auth'])->name('artists.create');

Route::get('albums', [AlbumController::class, 'create'])
    ->middleware(['auth'])->name('albums.create');

Route::post('albums', [AlbumController::class, 'store'])
    ->middleware(['auth'])->name('albums.store');

Route::delete('albums/{album}', [AlbumController::class, 'destroy'])
    ->middleware(['auth', 'admin'])->name('albums.destroy');;

require __DIR__ . '/auth.php';
