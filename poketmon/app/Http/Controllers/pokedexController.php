<?php

namespace App\Http\Controllers;

use App\Models\Poketmon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class pokedexController extends Controller
{
    public function show() {
//        $poketmons = Poketmon::where('num','<','5')->get();
//        foreach ($poketmons as $list) {
//            echo $list->name.'<br>';
//        }
        $returnData = "";
        return view('pokedex',['data'=>$returnData]);
    }

    public function showMore(Request $request,$page) {
        $offset = 20;

        // 숫자인지 확인
        if (!is_numeric($page)) {
            $page = 0;
        }

        $resultArray = [];
        $poketmons = Poketmon::all()->skip($offset * $page)->take($offset);

        foreach ($poketmons as $result) {
            if (!is_integer($result['num']) || $result['num'] < 1) {
                continue;
            }
            $poket['num'] = 'No.'.sprintf('%03d',$result['num']);
            $poket['name'] = $result['name'];
            $poket['html'] = '<li>
                <a href="pokedex/'.$result['num'].'">
                    <div class="li_wrap">
                        <div class="img">
                            <div class="thumb">
                                <img src="'.$result['img'].'" alt="'.$poket['name'].'">
                            </div>
                        </div>
                        <div class="info">
                            <div class="num">'.$poket['num'].'</div>
                            <div class="name">'.$poket['name'].'</div>
                        </div>
                    </div>
                </a>
            </li>';
            array_push($resultArray,$poket);
        }

        return response()->json(array('result'=>$resultArray));
    }

    public function showDetail(Request $request, $num){
        $result = [];
        $pokeList = [];
        $evolution = [];

        $thisPoke = Poketmon::all()->where('num','=',$num);
        $pokeListRes = DB::table('poketmons')->select('name','num')
            ->orWhere('num','=',$num + 1)
            ->orWhere('num','=',$num - 1)
            ->get();

//        $pokeListRes = DB::table('poketmons')
//            ->select('name','num','num+1 as next_num','num-1 as pre_num')
//            ->where('num','=',$num)
//            ->get();

        /*
         * select num,name,num+1 as next_num,num-1 as pre_num,
         * (select max(num) from poketmons) as max_num
         * from poketmons where num = 1; -> 이거 불러오기
         *
         * 1 일때 2,151
         * 151 일때 1,150
         */

        foreach ($pokeListRes as $pokeInfo) {
            // 다음 번호 포켓몬
            if ($pokeInfo->num == $num + 1) {
                $next['num'] = $pokeInfo->num;
                $next['name'] = $pokeInfo->name;

                echo $next['num'].' '.$next['name'].'<br>';
                $pokeList[1] = $next;
            } elseif ($pokeInfo->num == $num - 1) {
                $pre['num'] = $pokeInfo->num;
                $pre['name'] = $pokeInfo->name;

                echo $pre['num'].' '.$pre['name'].'<br>';
                $pokeList[0] = $pre;
            }
        }

        foreach ($thisPoke as $pokeInfo) {
            $info['num'] = $pokeInfo['num'];
            $info['name'] = $pokeInfo['name'];
            $info['img'] = $pokeInfo['img'];
            $info['group_num'] = $pokeInfo['group_num'];

            if ($info['group_num'] > 0) {
                $evolutionPoke = DB::table('poketmons as a')
                    ->join('evolutions as b','a.group_num','=','b.group_num')
                    ->select('b.*')
                    ->where('a.num','=',$info['num'])
                    ->get();

                foreach ($evolutionPoke as $evolPoke) {
                    $evolInfo = [];
                    $evolInfo['name'] = $evolPoke->name;
                    $evolInfo['num'] = $evolPoke->num;
                    $evolInfo['img'] = $evolPoke->img;

                    // 진화 포켓몬
                    array_push($evolution,$evolInfo);
                }
            }
            // 현재 포켓몬
            array_push($result,$info);
        }
        return view('poketDetail',
            [
                'poke'=>$result,
                'evolution' =>$evolution,
                'pokeList' =>$pokeList,
                //'pre_num' => $
            ]);
    }
}
