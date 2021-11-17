<?php

namespace App\Http\Controllers;

use App\Models\Poketmon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class jsonPaseTestController extends Controller
{
    public function show() {
        //$jsonUrl = 'https://raw.githubusercontent.com/intelcoder/PokemonGO-Pokedex-Korean/master/pokedex-korean.json';
        $jsonUrl = asset('json/pokedex-korean.json');
        $jsonStr = file_get_contents($jsonUrl);

        $str = json_decode($jsonStr,false);

        foreach ($str as $poke) {
            //unset($poke_group);
            $poke_group = [];

            echo $poke->name.' '.$poke->num.'<br>';

            //이전 진화
            if (isset($poke->prev_evolution)) {
                foreach ($poke->prev_evolution as $pre) {
                    echo '이전 진화 : '.$pre->name . '<br>';
                    // 이전 진화를 포켓몬 그룹에 넣기
                    // 이상해풀이면 이상해씨가 들어감
                    array_push($poke_group,$pre->num);
                }
            }

            // 다음 진화
            if (isset($poke->next_evolution)) {
                foreach ($poke->next_evolution as $next) {
                    echo '다음 진화 : '.$next->name . '<br>';
                }

                if (!isset($poke_group[0])) {
                    array_push($poke_group,$poke->num);
                }
            }

            if (isset($poke_group[0])) {
                echo '포켓몬 그룹 : '.$poke_group[0].'<br>';
            }

            echo '<br>';
        }
        $returnData = "";
        return view('jsonParseTest',['data'=>$returnData]);
    }

    function showRare() {
        $jsonUrl = asset('json/pokedex-korean.json');
        $jsonStr = file_get_contents($jsonUrl);
        $str = json_decode($jsonStr,false);

        for ($i=0; $i<8; $i++) {
            ${'rare_'.$i} = [];
        }

        foreach ($str as $poke) {
            array_push(${'rare_'.(int)$poke->rare},$poke->num);
        }

        $groupArray = [
            ['rate'=>0,'value'=>'rare_0'],
            ['rate'=>0.5,'value'=>'rare_1'],
            ['rate'=>3,'value'=>'rare_2'],
            ['rate'=>5,'value'=>'rare_3'],
            ['rate'=>8.5,'value'=>'rare_4'],
            ['rate'=>13,'value'=>'rare_5'],
            ['rate'=>25,'value'=>'rare_6'],
            ['rate'=>45,'value'=>'rare_7'],
        ];

        $randomGroup = randomRate($groupArray);
        $randomPokemon = ${$randomGroup}[mt_rand(0,count(${$randomGroup})-1)];

        $randomGroup = randomRate($groupArray);
        $randomPokemonNum = ${$randomGroup}[mt_rand(0,count(${$randomGroup})-1)];
        $pokemonInfo = Poketmon::where('num',$randomPokemonNum)->get();

        foreach ($pokemonInfo as $poke) {
            echo $poke['num'].'<br>';
            echo $poke['name'].'<br>';
            echo 'origin_height : '.$poke['height'].'<br>';
            echo 'origin_weight : '.$poke['weight'].'<br>';
            echo 'random_height : '.weight($poke['height']).'<br>';
            echo 'random_weight : '.weight($poke['weight']).'<br>';
        }

        for($i=0; $i<20; $i++) {
            $pokemonInfo = Poketmon::where('num', $randomPokemonNum)->get();

            foreach ($pokemonInfo as $poke) {
                echo 'random_height : ' . weight($poke['height']).'<br>';
                echo 'random_weight : ' . weight($poke['weight']).'<br>';
            }
        }
        //echo $pokemonInfo[0];

//        echo $randomGroup.'<br>';
//        echo $randomPokemonNum;

        $returnData = "";
        return view('jsonParseTest',['data'=>$returnData]);
    }
}
