<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/lib/db.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/lib/encryption.php';

$dbi = new db();
$enc = new encryption();

if(!isset($_POST['id']) || !isset($_POST['pw'])) {
    echo '<script>alert("잘못된 경로입니다."); history.back();</script>';
    exit;
} else {
    echo 'id: '.$_POST['id'];
    echo ' pw: '.$_POST['pw'];

    $user = array('id'=>$_POST['id']);
    $dbi->select_query('user',$user);

    $result = array();
    $i=0;

    while ($row = $dbi->fetch()) {
        $result[$i]['id'] = $row['id'];
        $result[$i]['pw'] = $enc->solve($row['pw']);
        $i++;
    }

    if (empty($result) || $_POST['pw'] != $result[0]['pw']) {
        //echo count($result);
        echo '<script>alert("아이디 또는 비밀번호가 일치하지 않습니다."); history.back()</script>';
        exit;
    }
    echo '<br>'.$result[0]['id'].'<br>';
    echo $result[0]['pw'];


}