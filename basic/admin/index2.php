<?php
include_once $_SERVER['DOCUMENT_ROOT'].'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Layout</title>
    <style>
        /* * {padding: 0; margin:0}*/
        body {
            background: #F6F6F6;
            font-size: 30px;
        }
        a:link { color: black; text-decoration: none;}
        a:visited { color: black; text-decoration: none;}
        a:hover { color: blue; text-decoration: none;}

        #wrap {width:1200px; margin:0 auto;}

        header {
            text-align: center;
            font-size: 60px;
        }
        section {
            text-align: center;
            clear: both;
        }

        input {
            width: 200px;
            height: 50px;
            border: none;
            border-bottom: #dcdcdc 2px solid;
            background: none;
            outline: none;
            font-size: 15px;
            margin-bottom: 10px;
        }

        .button {
            width: 120px;
            height: 50px;
            margin: 30px 10px 10px 10px;
            border-radius: 10px;
            border: none;
            font-size: 20px;
            background-color: #585858;
            color: white;
        }

        /*
        header {width:100%; height: 150px; background: #9575cd;}
        aside {float:left; width:30%; height: 700px; background: #7e57c2;}
        section {float:left; width:70%; height: 700px; background: #673ab7;}
        footer {clear: both; width:100%; height: 150px; background: #5e35b1;}
        */
        /*반응형할땐 스크롤바가 없어야한다 따라서 크기를 좀 크게*/
        @media (max-width: 1220px) {
            #wrap {width: 95%}
        }

        @media (max-width: 768px) {
            #wrap {width: 100%}
        }

        @media (max-width: 480px) {
            #wrap {width: 100%;}
            header {height: 300px;}
            aside {float: none; width: 100%; height: 300px;}
            section {float: none; width: 100%; height: 300px;}
        }
    </style>
</head>
<body>
<div id="wrap">
    <header style="color: #585858; font-weight: bold; font-size: 30px; margin-top: 15vh;">
        Admin LogIn
    </header>
    <section>
        <div style="display: inline-block;">
            <label>
                <input type="text" placeholder="id"><br>
                <input type="text" placeholder="password">
            </label>
        </div>
        <div>
            <input class="button" type="button" value="Login">
            <input class="button" type="button" value="Back">
        </div>
    </section>
    <footer></footer>
</div>
</body>
</html>
