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
        .login_text
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
        .login_text:focus
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
        h1 {color: #585858;}

        a {text-decoration: none;}

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
            .login_text
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

            h1 {font-size: x-large;}
        }

    </style>
</head>
<body>

<div id="wrap">
    <div class="login">
        <a href="<?=LOCAL?>">
            <h1>Test World<br>
                Admin page</h1>
        </a>
        <form method="post">
            <input class="login_text" type="text" placeholder="ID" name="id" autocomplete="off"><br>
            <input class="login_text" type="password" placeholder="password" name="pw"><br>
            <input class="index_submit" type="submit" formaction="proc/signin.php" value="Log in">
            <input class="index_submit" type="submit" value="Join" formaction="join_form.php" >
        </form>
    </div>
</div>
</body>
</html>