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

Route::get('/', function () {
    return view('main');
});

Route::group(['middleware' => ['web'], 'namespace' => 'App\Http\Controllers\Game'], function () {
    Route::get('/games', 'IndexController')->name('game.index');
    Route::get('/games/create', 'CreateController')->name('game.create');
    Route::get('/games/bot', 'BotController')->name('game.bot');
    Route::get('/games/{game}', 'ShowController')->name('game.show');

    Route::post('/game/verify/{id}', 'VerifyController')->name('game.verify');
    Route::post('/game/check', 'CheckController')->name('game.check');

    Route::post('/games', 'StoreController')->name('game.store');
});
