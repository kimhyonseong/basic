<?php

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

    Route::get('/welcome', function () {
        return view('welcome');
    });

    Route::get('/test', function () {
//        $view = view('test');
//        $view->test = 'first test';
        $items = array('apple','iphone');

        return view('test',compact('items'));
    });

    Route::get('/test2',function () {
        $test = DB::table('tests')->get();

        return view('test2',compact('test'));
    });

    Route::get('posts',function () {
        return 'Hello';
    });