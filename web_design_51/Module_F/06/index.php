<?php

foreach(range(1,1) as $index){
    $f = file_get_contents("./STDIN{$index}.txt");

    $lines = explode("\r\n",$f);

    $n = array_shift($lines);

    $out = [];
    foreach(range(1,$n) as $i){
        $in = array_shift($lines);
        $c = 0;
        if(preg_match('/[0-9]/',$in)) $c++;
        if(preg_match('/[A-Z]/',$in)) $c++;
        if(preg_match('/[a-z]/',$in)) $c++;
        if(preg_match('/\~|\!|\@|\#|\$|\%|\^|\&|\*|\(|\)|\_|\+|\=|\-|\\|\||\'|\;|\"|\:|\/|\.|\,|\?|\>|\</',$in)) $c++;
        $out[] = $c;
    }

    file_put_contents("./STDOUT{$index}.txt",implode("\r\n",$out));
}