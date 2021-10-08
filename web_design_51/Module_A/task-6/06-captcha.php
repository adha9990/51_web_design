<?php

session_start();

$s = '1234567890WERTYUIOPASDFGHJKLZXCVBNM';
$s = str_shuffle($s);
$s = substr($s,0,4);

$_SESSION['captcha'] = $s;

$width = 300;
$height = 300;

$im = imagecreatetruecolor($width,$height);
$white = imagecolorallocate($im,255,255,255);
$black = imagecolorallocate($im,0,0,0);

$x = 20;
$y = 20;

foreach(str_split($s) as $text){
    $size = 20;
    $angle = rand(0,360);
    $font = 'C:\Windows\Fonts\arial.ttf';
    imagettftext($im,$size,$angle,$x,$y,$white,$font,$text);
    imageline($im,0,rand(0,$height),$width,rand(0,$height),$white);
    
    $bbox = imagettfbbox($size,$angle,$font,$text);

    $x += $bbox[0] + 80;
    $y += $bbox[1] + 80;
}

header('Content-Type:image/jpeg');

imagejpeg($im);
imagedestory($im);