<?php
if(strpos($_SERVER['HTTP_REFERER'],'07.html')){
    header('Content-Type:image/jpeg');
    $im = imagecreatefromjpeg('images/1519801807380.jpg');
    imagejpeg($im);
    imagedestory($im);
}else{
    http_response_code(403);
}