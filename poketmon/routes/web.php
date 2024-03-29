<?php

    use App\Http\Controllers\findPokeController;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\pokedexController;
    use App\Http\Controllers\jsonPaseTestController;

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

    Route::get('/jsonParse', [jsonPaseTestController::class, 'showRare'])->name('jsonParse');
    Route::get('/pokedex', [pokedexController::class, 'show'])->name('pokedex');
    Route::get('/myPokedex', [pokedexController::class, 'myPoke'])->name('myPokedex')->middleware('auth');
    Route::get('/pokedex/{num}', [pokedexController::class, 'showDetail'])->name('pokedexPage');
    Route::get('/poketAjax/{page}', [pokedexController::class, 'pokeList'])->name('poketAjax');
    Route::get('/myPoketAjax/{page}', [pokedexController::class, 'myPokeList'])->name('myPoketAjax')->middleware('auth');

    Route::get('/findPoke', [findPokeController::class, 'index'])->name('findPoke')->middleware('auth');
    Route::get('/findPokeAjax', [findPokeController::class, 'find'])->name('findPokeAjax')->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
