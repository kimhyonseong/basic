<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/config.php';

class encryption
{
    public function lock($password) {
        global $key;
        $iv = "I'm The_King! v1";
        $lock_pw = openssl_encrypt($password,'aes-256-cbc',$key,false,$iv);
        return $lock_pw;
    }

    public function solve($password) {
        global $key;
        $iv = "I'm The_King! v1";
        $solve_pw = openssl_decrypt($password,'aes-256-cbc',$key,false,$iv);
        return $solve_pw;
    }
}