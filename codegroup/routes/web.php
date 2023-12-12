<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\GameController;

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
    return redirect()->route('login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('/app')->group(function(){
    
    //users
    Route::get('/users/index', [UserController::class, 'index'])->name('user-index')->middleware('auth');
    Route::get('/users/view/{id}', [UserController::class, 'view'])->name('user-view')->middleware('auth');
    Route::get('/users/add', [UserController::class, 'add'])->name('user-add')->middleware('auth');
    Route::post('/users/record', [UserController::class, 'record'])->name('user-record')->middleware('auth');
    Route::get('/users/edit/{id}', [UserController::class, 'edit'])->name('user-edit')->middleware('auth');
    Route::post('/users/update/{id}', [UserController::class, 'update'])->name('user-update')->middleware('auth');
    Route::delete('/users/delete/{id}', [UserController::class, 'delete'])->name('user-delete')->middleware('auth');

    //Players
    Route::get('/players/index', [PlayerController::class, 'index'])->name('player-index')->middleware('auth');
    Route::get('/players/view/{id}', [PlayerController::class, 'view'])->name('player-view')->middleware('auth');
    Route::get('/players/add', [PlayerController::class, 'add'])->name('player-add')->middleware('auth');
    Route::get('/players/addfake', [PlayerController::class, 'addfake'])->name('player-addfake')->middleware('auth');
    Route::post('/players/record', [PlayerController::class, 'record'])->name('player-record')->middleware('auth');
    Route::get('/players/edit/{id}', [PlayerController::class, 'edit'])->name('player-edit')->middleware('auth');
    Route::post('/players/update/{id}', [PlayerController::class, 'update'])->name('player-update')->middleware('auth');
    Route::delete('/players/delete/{id}', [PlayerController::class, 'delete'])->name('player-delete')->middleware('auth');

    //games
    Route::get('/games/index', [GameController::class, 'index'])->name('game-index')->middleware('auth');
    Route::get('/games/view/{id}', [GameController::class, 'view'])->name('game-view')->middleware('auth');
    Route::get('/games/add', [GameController::class, 'add'])->name('game-add')->middleware('auth');
    Route::post('/games/record', [GameController::class, 'record'])->name('game-record')->middleware('auth');
    Route::get('/games/teams/{id}', [GameController::class, 'teams'])->name('game-team')->middleware('auth');
    Route::get('/games/presence/{id}/{p}', [GameController::class, 'presence'])->name('game-presence')->middleware('auth');
    Route::delete('/games/delete/{id}', [GameController::class, 'delete'])->name('game-delete')->middleware('auth');
    Route::get('/games/sortingteam/{id}', [GameController::class, 'sortingteams'])->name('game-sortingteam')->middleware('auth');
    
});