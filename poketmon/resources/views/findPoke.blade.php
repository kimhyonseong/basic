@extends('layouts.frame')

@section('css')
    .forest {
    margin-top: 25px;
    width: 100%;
    display: flex;
    flex-direction: column;
    }
    .forest .flower_bed {
    display: flex;
    justify-content: center;
    float: left;
    }
    .forest .flower_bed .grass_row{
    width: 15%;
    }
    .forest .grass {
    width: 100%;
    height: 100%;
    cursor: pointer;
    }
    .curtain {
    position: absolute;
    width: 100%;
    height: 100%;
    background-color: rgba(0,0,0,0.7);
    top: 0;
    display: none;
    }
    .curtain .info_box{
    position: absolute;
    width: 70%;
    height: 70%;
    /*border: 1px blue solid;*/
    border-radius: 25px;
    top: 50%;
    left: 50%;
    transform: translate(-50%,-50%);
    background-color: white;
    }
@endsection

@section('content')
    <div class="forest">
        @for($j=0; $j<4; $j++)
            <ul class="flower_bed">
            @for($i=0; $i<5; $i++)
                <li class="grass_row">
                    <img class="grass" src="{{asset('image/green2.png')}}" alt="풀숲">
                </li>
            @endfor
            </ul>
        @endfor
    </div>
    <div class="curtain">
        <div class="info_box">
            <button class="close">닫기</button>
        </div>
    </div>
@endsection

@section('script')
    <script>
        let grass = document.getElementsByClassName('grass');
        let curtain = document.getElementsByClassName('curtain').item(0);
        let close_bt = document.getElementsByClassName('close').item(0);

        function shakeGrass(element) {
            element.src = element.src === 'http://localhost/image/green1.png'?'http://localhost/image/green2.png':'http://localhost/image/green1.png';
        }

        function findPoke() {
            let xml = new XMLHttpRequest();

            xml.onreadystatechange = function () {
                if (this.status === 200 && this.readyState === this.DONE) {
                    let info = JSON.parse(xml.response);
                    console.log(info);
                    console.log(info.pokemon[0].name);
                }
            }
            xml.open('GET','/findPokeAjax',true);
            xml.send();
        }

        window.addEventListener('DOMContentLoaded', function () {
            Array.from(grass).forEach(function (element) {
                element.addEventListener('mouseover',() => shakeGrass(element));
                element.addEventListener('mouseout',() => shakeGrass(element));
                element.addEventListener('click',function () {
                    curtain.style.display = 'block';
                    findPoke();
                });
            })

            close_bt.addEventListener('click',function () {
                curtain.style.display = 'none';
            })
        })
    </script>
@endsection
