<?php

foreach(range(1,1) as $index){
    $f = file_get_contents("./STDIN{$index}.txt");

    $lines = explode("\r\n",$f);

    $n = array_shift($lines);

    $out = [];

    foreach(range(1,$n) as $m){
        $t = array_shift($lines);

        $ar = [];
        foreach(str_split($t) as $i){
            switch($i){
                case '(':
                    $ar[] = $i;
                    break;
                case ')':
                    $key = array_search('(',$ar);
                    if($key > -1){
                        array_splice($ar,$key,1);
                    }else{
                        $key = array_search('*',$ar);
                        if($key > -1){
                            array_splice($ar,$key,1);
                        }else{
                            $ar[] = $i;
                        }
                    }
                    break;
                case '*':
                    $ar[] = $i;
                    break;
                default:
                    $ar[] = $i;
            }
        }
        $a = 0;
        $b = 0;
        foreach($ar as $i){
            if($i == "(") $a++;
            if($i == ")") $b++;
            if($i == "*"){
                if($a > 0) $a--;
            }
        }
        $out[] = ($a==0 && $b==0?"Y":"N");
    }

    file_put_contents("./STDOUT{$index}.txt",implode("\r\n",$out));
}