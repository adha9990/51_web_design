<?php

function maxProfit($k,$length,$price){
    if($length == 0) return 0;
    
    $dp = array_fill(0,$length,0);

    foreach(range(1,$k) as $t){
        $min = $price[0];
        $max = 0;
        for($i=0;$i<$length;$i++){
            $min = min($min, $price[$i] - $dp[$i]);
            $max = max($max, $price[$i] - $min);
            $dp[$i] = $max;
        }
    }

    return $dp[count($dp)-1];
}

foreach(range(1,3) as $index){
    $f = file_get_contents("./STDIN{$index}.txt");

    $lines = explode(PHP_EOL,$f);

    list($m,$n) = explode(' ',array_shift($lines));
    
    $ar = explode(' ',array_shift($lines));
    
    $s = maxProfit($m,$n,$ar);

    file_put_contents("./STDOUT{$index}.txt",$s);
}