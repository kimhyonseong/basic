<%@ page contentType="text/html;charset=UTF-8" language="java" %>
<html>
<head>
    <title>Title</title>
    <script src="https://code.jquery.com/jquery-1.11.3.js"></script>
</head>
<body>
<h2>commentTest</h2>
comment <input type="text" name="comment"><br>
<button id="sendBtn" type="button">SEND</button>
<button id="modBtn" type="button">수정</button>
<div id="commentList"></div>
<script>
    let bno = 607;

    let showList = function (bno) {
        $.ajax({
            type:'GET',       // 요청 메서드
            url: '/ch4/comments?bno='+bno,  // 요청 URI
            success : function(result){
                console.log(result);
                $("#commentList").html(toHtml(result));
            },
            error   : function(){ alert("error") } // 에러가 발생했을 때, 호출될 함수
        }); // $.ajax()
    }

    $(document).ready(function(){
        showList(bno)

        $("#sendBtn").click(function(){
            let comment = $("input[name=comment]").val();

            if (comment.trim() == '') {
                alert("댓글을 입력해주세요.");
                $("input[name=comment]").focus();
                return;
            }

            $.ajax({
                type:'POST',       // 요청 메서드
                url: '/ch4/comments?bno='+bno,  // 요청 URI
                headers : { "content-type": "application/json"}, // 요청 헤더
                dataType : 'text', // 전송받을 데이터의 타입
                data : JSON.stringify({bno:bno,comment:comment}),  // 서버로 전송할 데이터. stringify()로 직렬화 필요.
                success : function(result){
                    showList(bno)
                },
                error   : function(){ alert("error") } // 에러가 발생했을 때, 호출될 함수
            }); // $.ajax()
            showList(bno)
        });

        $("#modBtn").click(function(){
            let cno = $(this).attr("data-cno");
            let comment = $("input[name=comment]").val();

            if (comment.trim() == '') {
                alert("댓글을 입력해주세요.");
                $("input[name=comment]").focus();
                return;
            }

            $.ajax({
                type:'PATCH',       // 요청 메서드
                url: '/ch4/comments/'+cno,  // 요청 URI
                headers : { "content-type": "application/json"}, // 요청 헤더
                dataType : 'text', // 전송받을 데이터의 타입
                data : JSON.stringify({cno:cno,comment:comment}),  // 서버로 전송할 데이터. stringify()로 직렬화 필요.
                success : function(result){
                    alert(result);
                    showList(bno)
                },
                error   : function(){ alert("error") } // 에러가 발생했을 때, 호출될 함수
            }); // $.ajax()
            showList(bno)
        });

        $("#commentList").on('click','.modBtn',function() {
            let cno = $(this).parent().attr("data-cno");
            let bno = $(this).parent().attr("data-bno");
            let comment = $("span.comment", $(this).parent()).text();

            $("input[name=comment]").val(comment);
            $('#modBtn').attr("data-cno",cno);
        })

        $("#commentList").on('click','.delBtn',function(){
            let cno = $(this).parent().attr("data-cno");
            let bno = $(this).parent().attr("data-bno");

            $.ajax({
                type:'DELETE',       // 요청 메서드
                url: '/ch4/comments/'+cno+'?bno='+bno,  // 요청 URI
                success : function(result){
                    console.log(result);
                    //$("#commentList").html(toHtml(result));
                    showList(bno)
                },
                error   : function(){ alert("error") } // 에러가 발생했을 때, 호출될 함수
            }); // $.ajax()
        });
    });

    let toHtml = function (comments) {
        let tmp = "<ul>";

        comments.forEach(function (comments) {
            tmp += '<li data-cno='+comments.cno
            tmp += ' data.pcno='+comments.pcno
            tmp += ' data-bno='+comments.bno+'>'
            tmp += ' commenter=<span class="commenter">'+comments.commenter + '</span>'
            tmp += ' comment=<span class="comment">'+comments.comment + '</span>'
            tmp += ' update='+comments.up_date
            tmp += '<button class="delBtn">삭제</button>'
            tmp += '<button class="modBtn">수정</button>'
            tmp += '</li>'
        })

        return tmp + '</ul>';

    }
</script>
</body>
</html>