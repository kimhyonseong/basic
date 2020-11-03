<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/lib/db.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/lib/encryption.php';

$mode = $_POST['mode'];
$id = $_POST['id'];

$dbi = new db();
$enc = new encryption();

if ($mode == 'check') {
    // 아이디 유효성 체크
    if (preg_match("/[\xA1-\xFE\xA1-\xFE]/",$id) || strpos($id,' ') !== false) {
        echo 2;     // 한글 또는 공백포함 상태
        exit();
    }
    // ajax가 html 타입으로 호출함
    echo $dbi->check_id($id);
} else {
    $pw = $enc->lock($_POST['pw']);
    $name = $_POST['name'];
    $birth = $_POST['birth'];

    if($dbi->insert_user($id, $pw, $name, $birth)){
        echo '<script>alert("가입이 완료되었습니다."); location.href="'.LOCAL.'"</script>';
    } else {
        echo '<script>alert("에러가 발생하였습니다."); history.back();</script>';
    }
//    $where = array('id'=>'khs1');
//    $dbi->select_query('user',$where);

}