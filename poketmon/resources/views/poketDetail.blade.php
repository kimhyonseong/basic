@extends('layouts.frame')

@section('pokeList')
    <div class="pokeList">
        <div class="pokeListInner">
            <a href="/pokedex/{{$pokeList['pre']['num_int']}}">
                {{$pokeList['pre']['num_str'].' '.$pokeList['pre']['name']}}
            </a>
        </div>
        <div class="pokeListInner">
            <a href="/pokedex/{{$pokeList['next']['num_int']}}" class="right">
                {{$pokeList['next']['num_str'].' '.$pokeList['next']['name']}}
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
    .right {
    text-align: right;
    justify-content: right;
    margin-right: 0 !important;
    margin-left: 7px;
    }
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
    flex-wrap: wrap;
    justify-content: space-between;

    }
    .contain .pokeList .pokeListInner {
    flex: 1 1 50%;
    min-height: 50px;
    display: flex;
    align-items: center;
    }
    .contain .pokeList .pokeListInner a{
    background-color: #393939;
    color: #cbd5e0;
    width: 100%;
    height: 100%;
    padding: 0 10px;
    display: flex;
    align-items: center;
    margin-right: 7px;
    }
    .contain .pokeList .pokeListInner:hover {
    background-color: #2d3748;
    }
    .contain .evolution {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-evenly;
    }

@endsection
