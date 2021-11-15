<?php

namespace App\Http\Controllers;

use App\Models\Poketmon;
use Illuminate\Http\Request;

class findPokeController extends Controller
{
    public function index() {
        return view('findPoke');
    }

    public function find(): \Illuminate\Http\JsonResponse
    {
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

        $randomGroup = findRandomPoke($groupArray);
        $randomPokemonNum = ${$randomGroup}[mt_rand(0,count(${$randomGroup})-1)];
        $pokemonInfo = Poketmon::where('num',$randomPokemonNum)->get();

        return response()->json(array('pokemon'=>$pokemonInfo));
    }
}
