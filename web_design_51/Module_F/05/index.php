<?php

foreach(range(1,2) as $index){
    $f = file_get_contents("./STDIN{$index}.txt");

    $lines = explode(PHP_EOL,$f);

    $n = array_shift($lines);

    $out = [];
    foreach(range(1,$n) as $i){
        $in = str_replace(" ","",array_shift($lines));
        if(!preg_match("/^\d+$/",$in)){
            $out[] = "N";
        }else{
            $a = substr($in,0,strlen($in)-1);
            $b = substr($in,strlen($in)-1,1);
            $total = 0;
            for($j=0;$j<strlen($a);$j++){
                $c = substr($a,$j,1)*($j % 2!=0?1:2);
                if($c > 9) $c = floor($c/10) + $c % 10;
                $total += $c * 9;
            }
            $out[] = (substr($total,strlen($total)-1,1)==$b?"Y":"N");
        }
    }

    file_put_contents("./STDOUT{$index}.txt",implode(PHP_EOL,$out));
}