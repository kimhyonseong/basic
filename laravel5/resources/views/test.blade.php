<?php
//    var_dump($items);
//
//    $items2 = ['apple'=>'111','banana'=>'22'];
//
//    var_dump(compact("items2"));
//    echo 1;
    // 느낌표 다음에 탭 누르면 html 뼈대 만들어짐 -> php스톰 한정
    ?>
@if(isset($items))
    <p>첫번째는 {{$items[0]}} </p>
    밑에까지 다 출력됨<br><br>
    @endif

@forelse($items as $num => $obj)
    <p>{{$num}}번째는 {{$obj}}</p>
    @empty
<p>없다</p>
    @endforelse

