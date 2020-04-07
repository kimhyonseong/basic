<?php
//$_SERVER['DOCUMENT_ROOT'] = htdocs3/admin
include_once $_SERVER['DOCUMENT_ROOT'].'/config.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/lib/db.php';
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>Admin_index</title>
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
    <style>
        * {padding: 0; margin:0}
        #wrap {
            width:1200px;
            margin: 15vh auto;
            height: 100%;}

        .login
        {
            width: 500px;
            height: 600px;
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
        #signup
        {
            width: 250px;
            height: 50px;
            margin: 30px 10px 10px 10px;
            border-radius: 10px;
            border: none;
            font-size: 20px;
            background-color: #585858;
            color: white;
            transition: background-color .3s;
        }
        #signup:hover {background-color: pink;}
        body {background-color: #F6F6F6;}
        h1 {color: #585858;}
        a {text-decoration: none;}
        label {display: none;}

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
            #signup
            {
                width: 200px;
                height: 40px;
                font-size: 15px;
            }
            h1 {font-size: x-large;}
        }

    </style>
    <script>
        $(function () {
            $('#show').on('click',function () {
                var pw = $('#pw');
                if (pw.attr('type') == 'password') {
                    pw.attr('type','text');
                } else {
                    pw.attr('type','password');
                }
            });
            
            $('#check').on('click',function () {
                if ($('#id').val().length > 10) {
                    alert('최대 10자입니다.');
                    return false;
                } else {
                    $.ajax({
                        type: 'POST',
                        url: '<?=LOCAL?>/proc/signup.php',
                        data: {id: $('#id').val(), mode: 'check'},
                        dataType: 'html',
                        success: function (data) {
                            if (data == 1) {
                                alert('중복된 아이디입니다.');
                            } else {
                                alert('사용 가능합니다.');
                            }
                        },
                        error: function () {
                            alert('서버 환경이 원활하지 않습니다.\n관리자에게 문의해주세요.');
                        }
                    })
                }
            });

            $('#form').on('submit',function () {
                if ($('#id').val().length <= 3) {
                    alert('아이디 최소 4자');
                    $('#id').focus();
                    return false;
                } else if ($('#pw').val().length <= 3) {
                    alert('비번 최소 4자');
                    $('#pw').focus();
                    return false;
                } else if ($('#name').val().length <= 0) {
                    alert('이름 최소 1자');
                    $('#name').focus();
                    return false;
                } else if ($('#birth').val().length != 6 ||
                    isNaN($('#birth').val()) ) {
                    alert('생년월일 6자이며 숫자만 가능');
                    $('#birth').focus();
                    return false;
                }
            })
        })
    </script>
</head>
<body>
<div id="wrap">
    <div class="login">
        <a href="<?=LOCAL?>">
            <h1>Test World<br>
                Admin page</h1>
        </a>
        <form id="form" method="post" action="<?=LOCAL?>/proc/signup.php">
            <label for="id">아이디</label>
            <input class="login_text" type="text" placeholder="ID" name="id" id="id" autocomplete="off"><span id="check">o</span><br>
            <label for="pw">비밀번호</label>
            <input class="login_text" type="password" placeholder="password" name="pw" id="pw"><span id="show">o</span><br>
            <label for="name">이름</label>
            <input class="login_text" type="text" placeholder="name" name="name" id="name" autocomplete="off"><br>
            <label for="birth">생년월일</label>
            <input class="login_text" type="text" placeholder="birth" name="birth" id="birth" autocomplete="off"><br>
<!--            <input class="index_submit" type="submit" formaction="member/login.php" value="Log in">-->
<!--            <input class="index_submit" type="submit" value="Join" formaction="join_form.php" >-->
            <input class="index_submit" type="submit" id="signup" value="Join">
        </form>
    </div>
</div>
</body>
</html>