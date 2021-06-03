<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;

use App\Http\Controllers\Playercontroller;
use App\Http\Controllers\crapcontroller;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('login', [AuthController::class, 'login'])->name('auth.login');


Route::middleware('jwt.auth')->group(function() {  
     
    //Index
        Route::get('players/index', [PlayerController::class, 'index'])->name('index');
    //Create
        Route::get('players', [PlayerController::class, 'create']);
        Route::post('players', [PlayerController::class, 'store'])->name('players.store');
    //Edit
        Route::get('players/{player}/edit', [PlayerController::class, 'edit'])->name('players.edit');
        Route::put('players/{player}', [PlayerController::class, 'update'])->name('players.update');
    //Llistat de tots els jugadors del sistema amb el seu percentatge mig d’èxits  y % mig total
        Route::get('players/llist', [PlayerController::class, 'percentatge'])->name('percentatge');
    //Tiradas
        Route::get('players/{player}/games', [crapController::class, 'create'])->name('players.games');
    //Delete
        Route::delete('players/{player}/games', [crapController::class, 'destroy'])->name('craps.destroy');
    //Llistat de jugades per un jugador
        Route::get('players/{player}/craps', [PlayerController::class, 'show'])->name('show.players');
    //Winner
        Route::get ('players/ranking/winner', [PlayerController::class, 'winner'])->name('ranking.winner');
    //Loser
        Route::get ('players/ranking/loser', [PlayerController::class, 'loser'])->name('ranking.loser');

    //Logout   
        Route::post('logout', [AuthController::class, 'logout'])->name('auth.logout');
});