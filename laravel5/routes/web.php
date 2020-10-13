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

//Route::get('/', function () {
//    return view('welcome');
//});
    Route::get('/', 'IndexController@index');

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

    /* 레스트풀 리소스는 자제로 라우트 이름이 있음
    * route('posts.create') => http://localhost/posts/create
    */
    Route::resource('posts','PostController');

    // 라우트 이름 지정 및 컨트롤러 연결
    Route::get('post',[
        'as' => 'post.index',    // route('post.index')라는 문구로 localhost/post 호출 (라우트 이름 지정)
        'uses' => 'PostController@index'  // 컨트롤러 연결
    ]);

    Route::resource('post.comments','PostCommentController');

    // 사용자 인증
    Route::get('auth',function () {
       $credentials = [
           'email' => 'khs1@laravel.com',
           'password' => 'password'
       ];
       if (!Auth::attempt($credentials)) {
           return 'Incorrect username and password combination';
       }

       return redirect('protected');
    });

    Route::get('auth/logout',function (){
       Auth::logout();

       return 'See you again~';
    });

    // 로그인 체크 후 메시지 출력
//    Route::get('protected',function () {
//        if(!Auth::check()) {
//            return 'Illegal access! 꺼져';
//        }
//        return '환영, '.Auth::user()->name;
//    });

    // auth 미들웨어 사용하여 사용자 체크 후 안되어있으면 login으로 라우팅
    Route::get('protected',[
        'middleware' => 'auth',
        function() {
            return '환영, ' . Auth::user()->name;
        }
    ]);

    Route::get('auth/login',function () {
        return '로그인~';
    });

    //위에서 login으로 라우팅 할때 as가 login인 곳으로 들어옴
    Route::get('login',[
        'as' => 'login',
        function () {
            return '로그인~2';
        }
    ]);
//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
