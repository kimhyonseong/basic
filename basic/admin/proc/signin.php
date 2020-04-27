<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/lib/db.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/lib/encryption.php';

$dbi = new db();
$enc = new encryption();

if(!isset($_POST['id']) || !isset($_POST['pw'])) {
    //아이디 또는 비밀번호 없이 페이지에 들어왔을 시
    echo '<script>alert("잘못된 경로입니다."); history.back();</script>';
    exit;
} else {
//    echo 'id: '.$_POST['id'];
//    echo ' pw: '.$_POST['pw'];

    $user = array('id'=>$_POST['id']);
    $dbi->select_query('user',$user);

    //결과값을 넣을 배열 선언
    $result = array();
    $i=0;

    //배열에 결과값 삽입
    while ($row = $dbi->fetch()) {
        $result[$i]['id'] = $row['id'];
        $result[$i]['pw'] = $enc->solve($row['pw']);
        $i++;
    }
    //echo '<br>'.$result[0]['id'].'<br>';
    //echo $result[0]['pw'];

    if (empty($result) || $_POST['pw'] != $result[0]['pw']) {
        //비밀번호가 일치하지 않거나 결과가 없을때(아이디 없을때)
        echo '<script>alert("아이디 또는 비밀번호가 일치하지 않습니다."); history.back()</script>';
        exit;
        //echo count($result);
    } else {
        //쿠키 또는 세션 생성 및 이동
        echo '<script>alert("로그인 되었습니다."); location.replace("'.LOCAL.'/page/main.php");</script>';
    }
}