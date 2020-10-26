<?php

    use Illuminate\Support\Facades\Route;

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

    Route::resource('posts', 'App\Http\Controllers\PostsController');

    Route::resource('posts.comments', 'App\Http\Controllers\PostCommentController');

    Route::get('posts', [
        'as' => 'posts.index',
        'uses' => 'App\Http\Controllers\PostsController@index'
    ]);

    Route::get('auth', [
        'as' => 'login',
        function () {
            $credentials = [
                'email' => 'khs6524@example.com',
                'password' => 'password'
            ];
            if (!Auth::attempt($credentials)) {
                return 'Incorrect';
            }

            return redirect('protected');
        }
    ]);

    Route::get('auth/logout', function () {
        Auth::logout();

        return 'See you';
    });

    Route::get('protected', [
//    if (! Auth::check()){
//        return 'Illegal access';
//    }
        'middleware' => 'auth', // login 으로 리다이렉트 해줌 -> as => login 필요
        function () {
            return 'welcome ' . Auth::user()->name;
        }
    ]);
