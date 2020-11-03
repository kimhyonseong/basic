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
        var fileIndex = 0;
        var totalFileSize = 0;
        var fileList = [];
        var fileSizeList = [];


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

            //여기서 파일 업로드 함수 시작

            //이게 제일 중요함
            files = e.originalEvent.dataTransfer.files;

            if (files != null) {
                if (files.length < 1){
                    alert('폴더 업로드 불가');
                    return;
                }
                selectFile(files);
            }
            //console.log(files);
        });

        function selectFile(fileObject) {
            var files = fileObject;

            if(files != null) {
                for (var i=0; i<files.length; i++)
                {
                    // 파일 이름
                    var filenm = files[i].name;
                    var filenmArr = filenm.split('\.');

                    //확장자
                    var ext = filenmArr[filenmArr.length-1];

                    //용량
                    var fileSize = files[i].size / 1024 / 1024;

                    //if($.inArray(ext, ['exe', 'bat', 'sh', 'java', 'jsp', 'html',
                    // 'js', 'css', 'xml']) >= 0){
                    if (!($.inArray(ext.toLowerCase(),['jpg','jpeg','png','gif']) >= 0)) {
                        alert('jpg,jpeg,png,gif 확장자만 가능합니다.');
                        break;
                    } else if(fileSize > 100) {
                        //파일 하나당 최대 용량
                        alert('용량 초과');
                        break;
                    } else {
                        // 전체 파일 사이즈
                        totalFileSize += fileSize;

                        // 배열에 파일 넣기
                        fileList[fileIndex] = files[i];

                        fileSizeList[fileIndex] = fileSize;

                        addFileList(fileIndex,filenm,fileSize);

                        fileIndex++;
                    }
                }
            } else {
                alert('error');
            }
        }

        function addFileList(index,name,size) {
            var html = "";
            html += "<tr id='file_" + index + "'><td class='left' >";
            html +=  name + " / " + size + "MB ";
            html += "<span style='cursor: pointer;' class='delete_file'>삭제</span>";
            html += "</td></tr>";

            //html = html.replace(/#{index}/gi,'"'+index+'"'); data-index='"+index+"'

            $('#fileTableTbody').append(html);
        }

        // function deleteFile(index1) {
        //     //alert(index1);
        //     totalFileSize -= fileSizeList[index1];
        //
        //     delete fileList[index1];
        //
        //     delete fileSizeList[index1];
        //
        //     $('#file_'+index1).remove();
        // }

        $('.delete_file').on('click',function () {
            alert(1);
            // alert(this.dataset.index);
            // deleteFile(this.dataset.index);
        });
    })
</script>
<form action="process/upload.php">
    <input type="text" name="file_nm" placeholder="파일이름">
    <input type="text" name="file_desc" placeholder="파일설명">
    <input type="file" name="file" id="multi_file">

    <table>
        <tbody id="fileTableTbody">
        <tr>
            <td>
                <div id="file_load"
                     style="border: 1px solid mistyrose; width: 300px; height: 200px; margin-top: 10px;">

                </div>
            </td>
        </tr>
        </tbody>
    </table>
</form>
</body>
</html>