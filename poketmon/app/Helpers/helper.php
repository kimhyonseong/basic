<?php

    function Type($param)
    {
        if (is_numeric($param)) {
            return numToType($param);
        } else {
            return typeToNum($param);
        }
    }

    function typeToNum($str): int
    {
        switch (trim($str)) {
            case '노멀' :
            case '노말' :
                $typeNum = 1;
                break;
            case '불꽃' :
                $typeNum = 2;
                break;
            case '물' :
                $typeNum = 3;
                break;
            case '전기' :
                $typeNum = 4;
                break;
            case '풀' :
                $typeNum = 5;
                break;
            case '얼음' :
                $typeNum = 6;
                break;
            case '격투' :
                $typeNum = 7;
                break;
            case '독' :
                $typeNum = 8;
                break;
            case '땅' :
                $typeNum = 9;
                break;
            case '비행' :
                $typeNum = 10;
                break;
            case '에스퍼' :
                $typeNum = 11;
                break;
            case '벌레' :
                $typeNum = 12;
                break;
            case '바위' :
                $typeNum = 13;
                break;
            case '고스트' :
                $typeNum = 14;
                break;
            case '드래곤' :
                $typeNum = 15;
                break;
            case '악' :
                $typeNum = 16;
                break;
            case '강철' :
                $typeNum = 17;
                break;
            case '페어리' :
                $typeNum = 18;
                break;
            default :
                $typeNum = 0;
                break;
        }


        return $typeNum;
    }

    function numToType($num): string
    {
        switch (trim($num)) {
            case 1 :
                $typeStr = '노멀';
                break;
            case 2 :
                $typeStr = '불꽃';
                break;
            case 3 :
                $typeStr = '물';
                break;
            case 4 :
                $typeStr = '전기';
                break;
            case 5 :
                $typeStr = '풀';
                break;
            case 6 :
                $typeStr = '얼음';
                break;
            case 7 :
                $typeStr = '격투';
                break;
            case 8 :
                $typeStr = '독';
                break;
            case 9 :
                $typeStr = '땅';
                break;
            case 10 :
                $typeStr = '비행';
                break;
            case 11 :
                $typeStr = '에스퍼';
                break;
            case 12 :
                $typeStr = '벌레';
                break;
            case 13 :
                $typeStr = '바위';
                break;
            case 14 :
                $typeStr = '고스트';
                break;
            case 15 :
                $typeStr = '드래곤';
                break;
            case 16 :
                $typeStr = '악';
                break;
            case 17 :
                $typeStr = '강철';
                break;
            case 18 :
                $typeStr = '페어리';
                break;
            default :
                $typeStr = '알 수 없음';
                break;
        }

        return $typeStr;
    }

    function typeColor($number): string
    {
        switch (trim($number)) {
            case 1 :
                $bgColor = '#92999f';  //노말
                break;
            case 2 :
                $bgColor = '#efa061';  //불꽃
                break;
            case 3 :
                $bgColor = '#608fcf';  //물
                break;
            case 4 :
                $bgColor = '#ffeb3b';  //전기
                break;
            case 5 :
                $bgColor = '#7ab766';  //풀
                break;
            case 6 :
                $bgColor = '#8dccc0';  //얼음
                break;
            case 7 :
                $bgColor = '#bc4b6a';  //격투
                break;
            case 8 :
                $bgColor = '#a16ec2';  //독
                break;
            case 9 :
                $bgColor = '#ca7c50';  //땅
                break;
            case 10 :
                $bgColor = '#95a8d9';  //비행
                break;
            case 11 :
                $bgColor = '#e57879';  //에스퍼
                break;
            case 12 :
                $bgColor = '#9bbf48';  //벌레
                break;
            case 13 :
                $bgColor = '#c3b78f';  //바위
                break;
            case 14 :
                $bgColor = '#5769a7';  //고스트
                break;
            case 15 :
                $bgColor = '#336cbe';  //드래곤
                break;
            case 16 :
                $bgColor = '#585365';  //악
                break;
            case 17 :
                $bgColor = '#678d9e';  //강철
                break;
            case 18 :
                $bgColor = '#dc94e1';  //페어리
                break;
            default :
                $bgColor = '#BAB5B5FF';
                break;
        }
        return $bgColor;
    }

    function typeHtml($param): string
    {
        if (is_numeric($param)) {
            $html = '<span class="type" style="background-color: ' . typeColor($param) . '">' . Type($param) . '</span>';
        } else {
            $html = '<span class="type" style="background-color: ' . typeColor(Type($param)) . '">' . $param . '</span>';
        }
        return $html;
    }

    function randomNum($rateArray, $valueArray) {
        $random = mt_rand(1,array_sum($rateArray)*10);
        $preRate = 0;
        $nextRate = 0;
        $findGroup = '';

        for ($i=0; $i<count($rateArray); $i++) {
            // 이전 비율보다 크고 다음 비율보다 작거나 같아야 출력
            if ($random <= $rateArray[$i]*10 + $nextRate && $random > $preRate) {
                $findGroup = $valueArray[$i];
            } else {
                $nextRate +=  $rateArray[$i]*10;
            }
        }

        return $findGroup;
    }

    function randomRate(array $array) {
        /*
         * ex) [ ['rate']=>0,['value']=>0.1 ] 2차 배열
         */
        $findGroup = 0;
        $rateArray = [];
        $valueArray = [];

        foreach ($array as $key0 => $array2) {
            foreach ($array2 as $keys => $values) {
                if ($keys == 'rate') {
                    array_push($rateArray, $values);
                } else {
                    array_push($valueArray, $values);
                }
            }
        }

        $random = mt_rand(1,array_sum($rateArray) * 10);
        $preRate = 0;
        $nextRate = 0;

        for ($i=0; $i<count($rateArray); $i++) {
            // 이전 비율보다 크고 다음 비율보다 작거나 같아야 출력
            if ($random <= $rateArray[$i] * 10 + $nextRate && $random > $preRate) {
                $findGroup = $valueArray[$i];
                break;
            } else {
                $nextRate +=  $rateArray[$i] * 10;
            }
        }
        return $findGroup;
    }

    function weight(float $weight_or_height): string
    {
        // 소수점 둘째자리까지
        $randomWeight = [
            ['rate'=>5,'value'=>mt_rand($weight_or_height*400,$weight_or_height*500)*(-1)],
            ['rate'=>5,'value'=>mt_rand($weight_or_height*400,$weight_or_height*500)],
            ['rate'=>10,'value'=>mt_rand($weight_or_height*300,$weight_or_height*400)*(-1)],
            ['rate'=>10,'value'=>mt_rand($weight_or_height*300,$weight_or_height*400)],
            ['rate'=>15,'value'=>mt_rand($weight_or_height*200,$weight_or_height*300)*(-1)],
            ['rate'=>15,'value'=>mt_rand($weight_or_height*200,$weight_or_height*300)],
            ['rate'=>20,'value'=>mt_rand(0,$weight_or_height*200)*(-1)],
            ['rate'=>20,'value'=>mt_rand(0,$weight_or_height*200)]
        ];

        return sprintf('%.2f',$weight_or_height + (randomRate($randomWeight)/1000));
    }
