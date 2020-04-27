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
        * {padding: 0; margin:0}
        #wrap {
            width:1200px;
            margin: 15vh auto;
            height: 100%;}

        .login
        {
            width: 500px;
            height: 400px;
            margin: auto;
            text-align: center;
        }
        .text
        {
            width: 250px;
            height: 30px;
            margin: 15px;
            border: none;
            border-bottom: #dcdcdc 2px solid;
            font-size: 20px;
            padding: 5px;
            background-color: transparent;
        }
        .text:focus
        {
            border-bottom: pink 2px solid;
            outline: none;
        }
        .index_submit
        {
            width: 120px;
            height: 50px;
            margin: 30px 10px 10px 10px;
            border-radius: 10px;
            border: none;
            font-size: 20px;
            background-color: #585858;
            color: white;
            transition: background-color .3s;
        }
        .index_submit:hover {background-color: pink;}
        body {background-color: #F6F6F6;}
        p {color: #585858; font-weight: bold; font-size: xx-large;}

        a {text-decoration: none;}
        a:visited {color: #585858;}

        /*반응형할땐 스크롤바가 없어야한다 따라서 크기를 좀 크게*/
        @media (max-width: 1220px) {
            #wrap {width: 95%}
            .login
            {
                width: 500px;
                height: 400px;
                margin: auto;
                text-align: center;
            }
            .text
            {
                width: 200px;
                font-size: 15px;
            }

            .index_submit
            {
                width: 100px;
                height: 40px;
                font-size: 15px;
            }

            p {font-size: x-large;}
        }

    </style>
</head>
<body>

<div id="wrap">
    <div class="login">

        <p><a href="<?=LOCAL?>">Test World<br>Admin page</a></p>

        <form method="post">
            <input class="text" type="text" placeholder="ID" name="id" autocomplete="off"><br>
            <input class="text" type="password" placeholder="password" name="pw"><br>
            <input class="index_submit" type="submit" formaction="proc/signin.php" value="Log in">
            <input class="index_submit" type="submit" value="Join" formaction="join_form.php" >
        </form>
    </div>
</div>
</body>
</html>