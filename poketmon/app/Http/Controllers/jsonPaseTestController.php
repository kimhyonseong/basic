<?php

namespace App\Http\Controllers;

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
}