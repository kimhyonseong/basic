<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/config.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/lib/db.php';

    $id = $_POST['id'];
    $pw = $_POST['pw'];
    $name = $_POST['name'];
    $birth = $_POST['birth'];

    var_dump($DB1);
    $dbi = new db($DB1);
    $dbi->insert_user($id,$pw,$name,$birth);