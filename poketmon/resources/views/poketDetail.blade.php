@extends('layouts.frame')

@section('pokeList')
    <div class="pokeList">
        <div class="prePoke">
            <a href="/pokedex/{{$pokeList['pre']['num_int']}}">
                {{$pokeList['pre']['num_str'].$pokeList['pre']['name']}}
            </a>
        </div>
        <div class="nextPoke">
            <a href="/pokedex/{{$pokeList['next']['num_int']}}">
                {{$pokeList['next']['num_str'].$pokeList['next']['name']}}
            </a>
        </div>
    </div>
@endsection

@section('pokeInfo')
    <div class="pokeInfo">
        <div class="img">
            <img src="{{$poke[0]['img']}}" alt="{{$poke[0]['name']}}" style="width: 350px;">
        </div>
        <div class="info">
            {{$poke[0]['name']}}
        </div>
    </div>
@endsection

@section('evolution')
    <div class="evolution">
        @for($i = 0; $i < count($evolution); $i++)
        <div class="evolutionContent">
            <div class="pokeImg">
                <img src="{{$evolution[$i]['img']}}" alt="{{$evolution[$i]['name']}}">
            </div>
            <div class="info">
                {{$evolution[$i]['num_str']}}
                {{$evolution[$i]['name']}}
            </div>
        </div>
        @endfor
    </div>
@endsection

@section('content')
    <div class="contain">
        @yield('pokeList')
        @yield('pokeInfo')
        @yield('evolution')
    </div>
@endsection

@section('css')
    .contain {
    width: 100%;
    margin: auto;
    box-shadow : 0 0 0 1px #000 inset;
    }
    .contain .pokeInfo {
    width: 70%;
    height: 400px;
    margin: auto;
    /*border: 1px black solid;*/
    box-shadow : 0 0 0 1px #000 inset;
    display: flex;
    justify-content: center;
    }
    .contain .pokeInfo .img {
    width: 50%;
    height: 400px;
    margin: auto;
    box-shadow : 0 0 0 1px #000 inset;
    display: flex;
    justify-content: center;
    align-items: center;
    }
    .contain .pokeInfo .info {
    width: 50%;
    height: 400px;
    margin: auto;
    box-shadow : 0 0 0 1px #000 inset;
    }
    .contain .pokeList {
    display: flex;
    justify-content: space-between;
    }
    .contain .evolution {
    display: flex;
    }
@endsection
