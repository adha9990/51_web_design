<?php

foreach(range(1,1) as $index){
    $file = file_get_contents("STDIN{$index}.txt");
    $lines = explode(PHP_EOL,$file);
    $n = array_shift($lines);
    
    $data = [];
    foreach(range(1,$n) as $i){
        $s = array_shift($lines);
        $total = 0;
        foreach(range(1,$s) as $j){
            if($j != $s){
                if($s % $j == 0) $total += $j;
            }
        }
        $data[] = ($total == $s)?'Y':'N';
    }
    
    file_put_contents("STDOUT{$index}.txt",implode(PHP_EOL,$data));
}