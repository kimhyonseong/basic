<?php
include_once $_SERVER['DOCUMENT_ROOT'].'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Drag & Drop</title>
    <link href="https://fonts.googleapis.com/css?family=Gotu|Nanum+Gothic+Coding&display=swap" rel="stylesheet">
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script>
        $(function () {
            $('#drop').on('dragenter',function (e) {
                $(this).addClass('drag-over');
            }).on('dragleave',function (e) {
                $(this).removeClass('drag-over');
            }).on('dragover',function (e) {
                e.preventDefault();
            }).on('drop',function (e) {
                e.preventDefault();
                e.stopPropagation();  // 부모태그로 이벤트 전파 중지
                $(this).removeClass('drag-over');
            })
        })
    </script>
    <style>
        .drag-over {
            background: skyblue;
        }
    </style>
</head>
<body>
<div id="wrap">
    <header>
        Upload
    </header>
    <section>
        <div>
            <label>
                이미지 이름 : <input type="text" name="img"><br>
            </label>
            <label>
                이미지 링크 : <input type="text" name="link"><br>
            </label>
            <label>
                이미지 파일 : <input type="file" name="file"><br>
            </label>
            <div id="drop" style="border: 1px solid black; width: 300px; height: 200px;">
                드래그
            </div>
        </div>
        <div>
            <input class="button" type="button" value="Login">
        </div>
    </section>
    <footer></footer>
</div>
</body>
</html>
