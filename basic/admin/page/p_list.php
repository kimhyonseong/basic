<?php
//$_SERVER['DOCUMENT_ROOT'] = htdocs3/admin
include_once $_SERVER['DOCUMENT_ROOT'].'/config.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/lib/db.php';

//echo date("Y.m.d",1586754583);
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>Admin_index</title>
    <style>
        * {padding: 0; margin:0; color: #585858;}
        html {font-size: 20px;}
        body {background-color: #F6F6F6;}
        #wrap {
            width:1200px;
            /*margin: 15vh auto*/
            margin: auto;
            height: 100%;
        }

        header {
            /* color: #585858; */
            margin-top: 50px;
            font-weight: bold;
            text-align: center;
            font-size: 3.5rem;
        }

        nav {
            text-align: center;
            margin: 10px 0;
            /*display: inline;*/
        }
        nav ul {
            display: inline-block;
            width: 50%;
            /*text-align: center;*/
        }
        nav li {
            display: inline-block;
            border: 1px solid #585858;
            width: 30%;
            font-size: 2rem;
        }
        a {text-decoration: none;}
        main {
            width: 100%;
            height: 100%;
            border: 1px solid black;
            text-align: center;
        }
        img {
            width: 100%;
            height: 100%;
        }
        .art_box {
            display: inline-block;
            border: 1px solid #585858;
            /*width: 32%;*/
            /*height: 100%;*/
            text-align: center;
        }
        .img_box {
            display: inline-block;
            width: 80%;
        }
        .name_box{

        }
        li {
            display: inline-block;
        }
        /*반응형할땐 스크롤바가 없어야한다 따라서 크기를 좀 크게*/
        @media (max-width: 1200px) {
            html {font-size: 20px;}
            #wrap {width: 95%;}

            .art_box{
                /*width: 45%;*/
                height: 100%;
            }
        }
        @media (max-width: 720px) {
            html {font-size: 15px;}
            #wrap {width: 95%; }

            nav ul {
                width: 100%;
            }

            .art_box{
                /*width: 80%;*/
                height: 100%;
            }
            .name_box {
                font-size: 2rem;
            }
        }
        @media (max-width: 480px) {
            html {font-size: 12px;}

            .art_box{
                width: 80%;
                height: 100%;
            }
            .name_box {
                font-size: 2.5rem;
            }
        }

    </style>
</head>
<body>

<div id="wrap">
    <header>List</header>
    <nav>
        <ul>
            <li>메뉴1</li>
            <li>메뉴2</li>
            <li>메뉴3</li>
        </ul>
    </nav>
    <main>
        <div>
            <ul>
                <li>
                    <a href="#">
                        <div class="art_box">
                            <div class="img_box">
                                <img src="http://ipsumimage.appspot.com/qvga" alt="임시">
                            </div>
                            <div class="name_box">
                                이름
                            </div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div class="art_box">
                            <div class="img_box">
                                <img src="http://ipsumimage.appspot.com/qvga" alt="임시">
                            </div>
                            <div class="name_box">
                                이름
                            </div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div class="art_box">
                            <div class="img_box">
                                <img src="http://ipsumimage.appspot.com/qvga" alt="임시">
                            </div>
                            <div class="name_box">

                            </div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div class="art_box">
                            <div class="img_box">
                                <img src="http://ipsumimage.appspot.com/qvga" alt="임시">
                            </div>
                            <div class="name_box">

                            </div>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
    </main>
</div>
</body>
</html>