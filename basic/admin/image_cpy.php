<?php

$oldfile = '_ORG.jpg'; // 원본파일
$newfile = '_ORG.jpg'; // 복사파일

list($width,$height) = getimagesize($oldfile);

$dst = imagecreatetruecolor(480, 616);

if(strpos(strtolower($oldfile), ".jpg"))
    $image = imagecreatefromjpeg($oldfile);
else if(strpos(strtolower($oldfile), ".jpeg"))
    $image = imagecreatefromjpeg( $oldfile);
else if(strpos(strtolower($oldfile), ".png"))
    $image = imagecreatefrompng($oldfile);
else if(strpos(strtolower($oldfile), ".gif"))
    $image = imagecreatefromgif($oldfile);

imagecopyresampled($dst,$image,0,0,0,0,480,616,$width,$height);

if(strpos(strtolower($newfile), ".jpg"))
    imagejpeg($dst, $newfile);
else if(strpos(strtolower($newfile), ".jpeg"))
    imagejpeg($dst, $newfile);
else if(strpos(strtolower($newfile), ".png"))
    imagepng($dst, $newfile);
else if(strpos(strtolower($newfile), ".gif"))
    imagegif($dst, $newfile);
