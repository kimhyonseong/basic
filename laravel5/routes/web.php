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

<<<<<<< HEAD
<<<<<<< HEAD
//    Route::get('/', function () {
//        return view('welcome');
//    });
=======
    Route::get('/', function () {
        return view('welcome');
    });
>>>>>>> 76ca6df6dd6531b8fc1f10d8804284d1c7d21c43
=======
    Route::get('/', function () {
        return view('welcome');
    });
>>>>>>> 76ca6df6dd6531b8fc1f10d8804284d1c7d21c43

//    Route::resource('posts', 'App\Http\Controllers\PostsController');
//
//    Route::resource('posts.comments', 'App\Http\Controllers\PostCommentController');

//    Route::get('posts', [
//        'as' => 'posts.index',
//        'uses' => 'App\Http\Controllers\PostsController@index'
//    ]);

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

    Route::post('posts', function (\Illuminate\Http\Request $request) {
        $rule = [
            'title' => 'required',
            'body' => 'required|min:10'
        ];

        $validator = Validator::make($request->all(),$rule);

        if ($validator->fails()) {
            return redirect('posts/create')->withErrors($validator)->withInput();
        }

        return 'Valid & proceed to next job ~';
    });

    Route::get('posts/create',function () {
        return view('posts.create');
<<<<<<< HEAD
<<<<<<< HEAD
    });

    Route::get('/',function () {
        return App\Models\Post::findOrFail(100);
    });

    Route::get('readme',function (){
        $text = <<<EOT
**Note** To make lists look nice, you can wrap items with hanging indents:

    -   Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
        Aliquam hendrerit mi posuere lectus. Vestibulum enim wisi,
        viverra nec, fringilla in, laoreet vitae, risus.
    -   Donec sit amet nisl. Aliquam semper ipsum sit amet velit.
        Suspendisse id sem consectetuer libero luctus adipiscing.
EOT;
        return app(ParsedownExtra::class)->text($text);
=======
>>>>>>> 76ca6df6dd6531b8fc1f10d8804284d1c7d21c43
=======
>>>>>>> 76ca6df6dd6531b8fc1f10d8804284d1c7d21c43
    });