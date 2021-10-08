<?php
function overflow32($v){
    $v = $v % pow(2,32);
    if($v > pow(2,31)-1) return $v - pow(2,32);
    if($v < -pow(2,31)) return $v + pow(2,32);
    return $v;
}
function hashCode($str){
    $total = 0;
    foreach(range(0,strlen($str)-1) as $i){
        $total = overflow32(31 * $total + ord($str[$i]));
    }
    return $total;
}

foreach(range(1,2) as $index){
    $f = file_get_contents("./STDIN{$index}.txt");

    $lines = explode(PHP_EOL,$f);

    $n = array_shift($lines);

    $out = [];
    foreach(range(1,$n) as $m){
        $out[] = hashCode(array_shift($lines));
    }

    file_put_contents("./STDOUT{$index}.txt",implode(PHP_EOL,$out));
}