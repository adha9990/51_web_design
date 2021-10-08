<?php

foreach(range(1,2) as $index){
    $file = file_get_contents("STDIN{$index}.txt");
    $lines = explode(PHP_EOL,$file);
    
    $n = array_shift($lines);
    
    $ar = [];
    foreach(range(1,$n) as $i){
        $s = array_shift($lines);
        if(array_key_exists($s,$ar)){
            $ar[$s]++;
        }else{
            $ar[$s] = 1;
        }
    }

    asort($ar);
    ksort($ar);
    
    $max = $ar[array_key_first($ar)];
    $bool = false;
    $data = [];
    foreach($ar as $k => $v){
        if($v == $max){
            $data[] = $k;
        }else{
            $bool = true;
            return;
        }
    }

    $ans = $bool?implode(PHP_EOL,$data):'-1';

    file_put_contents("STDOUT{$index}.txt",$ans);
}