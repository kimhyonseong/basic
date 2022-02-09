<%@ page contentType="text/html;charset=utf-8" isErrorPage="false"%>
<%@ taglib uri="http://java.sun.com/jsp/jstl/core" prefix="c" %>

<html>
<head>
	<title>error.jsp</title>
</head>
<body>
isErrorPage="true" 일때 pageContext 기본객체 사용 가능<br>
모델을 통해 객체 전달 필요 없음<br>
강제 500 에러코드 반환<br>
<h1>예외가 발생했습니다.</h1>
발생한 예외 : ${pageContext.exception}<br>
예외 메시지 : ${pageContext.exception.message}<br>
<ol>
<c:forEach items="${ex.stackTrace}" var="i">
	<li>${i.toString()}</li>
</c:forEach>
</ol>
</body>
</html>