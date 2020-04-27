<?php
    /**
     * Created by PhpStorm.
     * User: KimHyonSeong
     * Date: 2020-03-29
     * Time: 오후 5:41
     */
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Test</title>
    <script type="text/javascript" src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
    <style>
        #file_load {
            transition: all .2s ease-in-out;
        }
    </style>
</head>
<body>
<script>
    $(function () {
        var files = '';
        $('#file_load').on('dragover',function (e) {
            e.stopPropagation();
            e.preventDefault();
            $(this).css('background','#E3aaaa');
        }).on('dragleave',function (e) {
            e.stopPropagation();
            e.preventDefault();
            $(this).css('background','#FFFFFF');
        }).on('drop',function (e) {
            e.stopPropagation();
            e.preventDefault();
            $(this).css('background','#FFFFFF');

            //여기서 함수
            files = e.originalEvent.dataTransfer.files;
            console.log(files);
        })
    })
</script>
<form action="process/upload.php">
    <input type="text" name="file_nm" placeholder="파일이름">
    <input type="text" name="file_desc" placeholder="파일설명">
    <input type="file" name="file">
    <div id="file_load" style="border: 1px solid mistyrose; width: 300px; height: 200px; margin-top: 10px;">

    </div>
</form>
</body>
</html>