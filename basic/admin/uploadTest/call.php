<?php
    /**
     * Created by PhpStorm.
     * User: KimHyonSeong
     * Date: 2020-03-29
     * Time: 오후 5:42
     */

    if (isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] != '') {
        echo 'ok';
    } else {
        echo '1';
    }
//    echo $_SERVER['HTTP_HOST'].'/'.$_SERVER['REMOTE_ADDR'].'/';
//    echo php_uname('n');
//    echo gethostbyname(gethostname());
//echo $_SERVER['HTTP_REFERER'];