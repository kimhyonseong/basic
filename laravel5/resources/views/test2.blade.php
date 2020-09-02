<?php

?>
@extends('testFrame')

@section('content')
    frame.blade 속 컨텐츠 yield에 넣기
    {{var_dump($test)}}<br>
    {{--$test['items']['id']--}}
    @forelse($test as $c => $v)
        {{$c}}
    @empty
    <p>DB 조회 못함</p>
    @endforelse
@stop
