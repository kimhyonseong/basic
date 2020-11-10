@extends('master')

@section('content')
    <header class="page-header">
        Documents Viewer
    </header>

    <div class="row">
        <div class="col-md-3 sidebar__documents">
            <aside>
                {!! $index !!}
            </aside>
        </div>
    </div>

    <div class="col-md-9 article__documents">
        <article>
            {{-- {{!! 이 속은 이스케이프 되지 않은 문자열 출력 !!}} --}}
            {!! $content !!}
        </article>
    </div>
@stop