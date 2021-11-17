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
    .curtain .info_box .info_box_inner{
    width: 100%;
    height: 100%;
    padding: 20px;
    box-sizing: border-box;
    display: flex;
    flex-direction: column;
    }
    .curtain .info_box .info_box_inner .menu {
    width: 100%;
    height: auto;
    }
    .curtain .info_box .info_box_inner .menu .close{
    float: right;
    border-radius: 30px;
    width: 30px;
    height: 30px;
    background-color: #d3d3d3;
    border: none;
    cursor: pointer;
    font-size: 15px;
    }
    .curtain .info_box .info_box_inner .info {
    width: 100%;
    height: auto;
    display: flex;
    }
    .curtain .info_box .info_box_inner .info .img_box,.text_box{
    width: 50%;
    height: auto;
    box-sizing: border-box;
    padding: 15px;
    }
    .curtain .info_box .info_box_inner .info .text_box{
    padding-left: 40px;
    }
    .curtain .info_box .info_box_inner .info .img_box #img,.text{
    width: 100%;
    }
    .curtain .info_box .info_box_inner .info .text_box .text .num{
    color: #6b7280;
    font-size: 25px;
    }
    .curtain .info_box .info_box_inner .info .text_box .text .name{
    font-size: 40px;
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
            <div class="info_box_inner">
                <div class="menu">
                    <button class="close">X</button>
                </div>
                <div class="info">
                    <div class="img_box">
                        <img id="img" src="https://via.placeholder.com/250"
                             onerror="this.src='https://via.placeholder.com/250'" alt="">
                    </div>
                    <div class="text_box">
                        <div class="text">
                            <h3><span class="num">No.000</span></h3>
                            <h3><span class="name">이름</span></h3>
                            <p class="type"></p>
                            <p class="weight">0.0 kg</p>
                            <p class="height">0.0 m</p>
                        </div>
                    </div>
                </div>
            </div>
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
                    console.log(xml.response);
                    console.log(info);
                    console.log('name : '+info.pokemon.name);
                    console.log('num : '+info.pokemon.name);
                    console.log('height : '+info.pokemon.height);
                    console.log('weight : '+info.pokemon.weight);
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
