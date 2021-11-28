<!doctype html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>도감</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        header {
            background-color: white;
            /*height: var(--header-height);*/
            height: 50px;
            display: flex;
            justify-content: space-between;
            box-shadow: 0 1px 20px 0 rgba(0, 0, 0, 0.4);
            font-size: 30px;
            position: fixed;
            width: 100%;
            z-index: 1000;
        }

        header .in_header {
            margin: auto;
            width: 100%;
            display: flex;
            justify-content: space-between;
        }

        header .right {
            font-size: 20px;
            margin: auto 0;
        }

        header ul {
            list-style: none;
            display: flex;
        }

        header ul li {
            padding: 0 10px;
        }
        main {
            padding-top: 50px;
        }

        main ul {
            list-style: none;
            display: flex;
            flex-wrap: wrap;
        }

        main ul li {
            margin-right: 10px;
        }

        a {
            /*text-decoration: none;*/
        }

        a:link {
            text-decoration: none;
            color: black;
        }

        a:visited {
            text-decoration: none;
            color: black;
        }

        a:hover {
            text-decoration: none;
            color: black;
        }
        @yield('css')
    </style>
</head>
<body>
<div id="wrap">
    @section('header')
    <header>
        <div class="in_header">
            <img src="{{asset('image/poketball.png')}}" style="width: 52px;" alt="메인 이동">
            <div class="right">
                <ul>
                    @guest
                        <li><a href="{{route('pokedex')}}">사전</a></li>
                        <li><a href="{{route('login')}}">로그인</a></li>
                    @else
                        <li><a href="{{route('findPoke')}}">풀숲</a></li>
                        <li><a href="{{route('pokedex')}}">도감</a></li>
                        <li><a href="{{route('myPokedex')}}">발견도감</a></li>
                        <li><a href="{{route('logout')}}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();
                            ">로그아웃</a></li>
                    @endguest
                        <li>검색</li>
                </ul>
                @if(Auth::check())
                    <form id="logout-form" action="{{route('logout')}}" method="POST">
                        @csrf
                    </form>
                @endif
            </div>
        </div>
    </header>
    @show
    <main>
        @yield('content')
    </main>
        @yield('script')
</div>
</body>
</html>
