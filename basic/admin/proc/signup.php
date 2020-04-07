<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/lib/db.php';

$mode = $_POST['mode'];
$id = $_POST['id'];

$dbi = new db();

if ($mode == 'check') {
    
    echo $dbi->check_id($id);
} else {
    $pw = $_POST['pw'];
    $name = $_POST['name'];
    $birth = $_POST['birth'];

    //var_dump($DB);
    $dbi->insert_user($id, $pw, $name, $birth);

}