<?php

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
use App\Http\Controllers\PlaylistController;
use App\Http\Controllers\ConteudoController;

Route::resource('/', PlaylistController::class);
Route::resource('index', PlaylistController::class);
Route::get('/playlists/create', [PlaylistController::class, 'create'])->name('playlists.create');
Route::post('/playlists', [PlaylistController::class, 'store'])->name('playlists.store');
Route::get('/playlists/{playlist}/edit', [PlaylistController::class, 'edit'])->name('playlists.edit');
Route::put('/playlists/{playlist}', [PlaylistController::class, 'update'])->name('playlists.update');
Route::delete('/playlists/{playlist}', [PlaylistController::class, 'destroy'])->name('playlists.destroy');

Route::get('/playlists/{playlist}/conteudos', [ConteudoController::class, 'showConteudos'])->name('playlists.conteudos');
Route::get('/playlists/{playlist}/conteudos/create', [ConteudoController::class, 'create'])->name('conteudos.create');
Route::post('/playlists/{playlist}/conteudos', [ConteudoController::class, 'store'])->name('conteudos.store');
Route::get('/playlists/{playlist}/conteudos/{conteudo}/edit', [ConteudoController::class, 'edit'])->name('conteudos.edit');
Route::put('/playlists/{playlist}/conteudos/{conteudo}', [ConteudoController::class, 'update'])->name('conteudos.update');
Route::delete('/playlists/{playlist}/conteudos/{conteudo}', [ConteudoController::class, 'destroy'])->name('conteudos.destroy');