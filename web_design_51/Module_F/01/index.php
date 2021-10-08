<?php

function gcd($a,$b){
    if($b == 0) return $a;
    return gcd($b,$a % $b);
}

foreach(range(1,2) as $index){
    $lines = file("STDIN{$index}.txt");
    $n = array_shift($lines);
    $a = intval(array_shift($lines));
    foreach(range(1,intval($n)-1) as $i){
        $b = intval(array_shift($lines));
        $a = gcd($a,$b);
    }

    file_put_contents("STDOUT{$index}.txt",$a);
}