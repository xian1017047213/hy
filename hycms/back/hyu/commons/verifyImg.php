<?php
use hybase\Tools\VerifiCodeImg;
require_once __DIR__ . '/../../../src/manager/tools/VerifiCodeImg.php';

$VerifiCodeImg = new VerifiCodeImg ();

$fontStyle='../../css/font/msyh.ttf';
$image=$VerifiCodeImg->verfiCodeImg($fontStyle);
header ( 'Content-type: image/jpeg' );
imagejpeg($image);
imagedestroy($image);
?>