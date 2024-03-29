<%@ page language="java" contentType="text/html; charset=UTF-8"%>
<%@ taglib uri="http://java.sun.com/jsp/jstl/core" prefix="c" %>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>fastcampus</title>
    <link rel="stylesheet" href="<c:url value='/css/menu.css'/>">
    <script src="https://code.jquery.com/jquery-1.11.3.js"></script>
</head>
<body>
<div id="menu">
    <ul>
        <li id="logo">fastcampus</li>
        <li><a href="<c:url value='/'/>">Home</a></li>
        <li><a href="<c:url value='/board/list'/>">Board</a></li>
        <li><a href="<c:url value='/login/login'/>">login</a></li>
        <li><a href="<c:url value='/register/add'/>">Sign in</a></li>
        <li><a href=""><i class="fas fa-search small"></i></a></li>
    </ul>
</div>
<div style="text-align:center">
    <h2>게시물 ${mode=="new"?"글쓰기":"읽기"}</h2>
    <form action="" id="form">
        <input type="hidden" name="bno" value="${boardDto.bno}" >
        <input type="text" name="title" value="${boardDto.title}" ${mode=="new"?"":"readonly"}>
        <textarea name="content" ${mode=="new"?"":"readonly"}>${boardDto.content}</textarea>
        <button type="button" id="writeBtn" class="btn">등록</button>
        <button type="button" id="modifyBtn" class="btn">수정</button>
        <button type="button" id="deleteBtn" class="btn">삭제</button>
        <button type="button" id="listBtn" class="btn">목록</button>
    </form>
</div>
<script>
    let msg = "${msg}";
    if(msg=="WRT_ERR") alert("실패, 다시 시도해주세요");
    $(document).ready(function () {
        $('#listBtn').on('click',function (){
            location.href = "<c:url value='/board/list'/>?page=${page}&pageSize=${pageSize}";
        })

        $('#deleteBtn').on('click',function (){
            if(!confirm("삭제하시겠습니까?")) return;
            let form = $('form');
            form.attr("action","<c:url value='/board/remove'/>?page=${page}&pageSize=${pageSize}");
            form.attr("method","post");
            form.submit();
        })

        $('#writeBtn').on('click',function (){
            let form = $('form');
            form.attr("action","<c:url value='/board/write'/>");
            form.attr("method","post");
            form.submit();
        })

        $('#modifyBtn').on('click',function (){
            // 1. 읽기 상태이면 수정상태로 변경
            let form = $('form');
            let isReadOnly = $("input[name=title]").attr("readonly");

            if (isReadOnly == "readonly") {
                $("input[name=title]").attr("readonly",false);
                $("textarea").attr("readonly",false);
                $("modifyBtn").html("등록");
                $("h2").html("게시물 수정");
                return;
            }

            // 2. 수정 상태이면 내용 서버로 전송
            form.attr("action","<c:url value='/board/modify'/>");
            form.attr("method","post");
            form.submit();
        })
    });
</script>
</body>
</html>