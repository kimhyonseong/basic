<?php
define('LOCAL','//local3_admin.com');

$DB = array(
    'Host' => 'localhost',
    'dbName' => 'basic',
    'dbUser' => 'root',
    'dbPass' => '1234'
);

$key = 'q1w2e3r4t5';

//실행되고 있는 파일위치: SCRIPT_FILENAME
$control_path = explode('/',$_SERVER['SCRIPT_FILENAME']);
$control_cnt = count($control_path);

//배열에서 몇번째에 'page'가 있는지 찾아내기, 있을때 'page'를 'control'로 바꾸기
$page_num = array_search('page',$control_path);
if ($page_num >= 0) {
    $control_path[$page_num] = 'control';
}
$control_file='';

//컨트롤 파일 포함시켜주기, 맨 끝 글자 자르기
for($i=0; $i< $control_cnt; $i++) {
    $control_file .= $control_path[$i].'/';
}
$control_file = substr($control_file,0,strlen($control_file)-1);

if (is_file($control_file)) {
    include_once $control_file;
}