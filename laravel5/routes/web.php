<?php

    use Illuminate\Support\Facades\Route;
    //use Illuminate\Events\Dispatcher;
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

    Event::listen('user.login',function($user){
//        var_dump('"user.log" event caught and passed data is: ');
//        var_dump($user->toArray());
        $user->last_login=(new DateTime)->format('Y-m-d H:i:s');

        return $user->save();
    });

    Route::get('auth',
        function () {
            $credentials = [
                'email' => 'khs6524@example.com',
                'password' => 'password'
            ];
            if (!Auth::attempt($credentials)) {
                return 'Incorrect';
            }

            //Event::fire('user.login', [Auth::user()]); -> 5.8부터 fire 없어짐
            Event::dispatch('user.login', [Auth::user()]);

            var_dump('Event fired and continue to next line...');

            return;
        }
    );



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
