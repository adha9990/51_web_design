<?php

foreach(range(1,2) as $index){
    $file = file_get_contents("STDIN{$index}.txt");
    $lines = explode(PHP_EOL,$file);

    $n = array_shift($lines);

    $out = [];

    $data = [];
    foreach(range(1,$n) as $i){
        list($type,$a,$b,$c,$d) = explode(' ',array_shift($lines));
        $data[$type] = [
            "C" => [
                "buy" => $a,
                "sell" => $b,
            ],
            "A" => [
                "buy" => $c,
                "sell" => $d,
            ],
        ];
    }

    $n = array_shift($lines);
    foreach(range(1,$n) as $i){
        list($w,$x,$y,$z) = explode(' ',array_shift($lines));
        $a = $data[$x][$w];
        $b = $data[$y][$w];
        $c = $z;

        $total = $c * $a['buy'] / $b['sell'];

        $total = floor($total * 100000) / 100000;
        $total = number_format($total,5,'.',',');

        $out[] = $total;
    }

    file_put_contents("STDOUT{$index}.txt",implode(PHP_EOL,$out));
}