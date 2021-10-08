<?php
$abc = [];

function permutation($data = [],$ar = []){
    global $abc;

    if(count($data) == 0) $abc[] = implode('',$ar);

    foreach($data as $k => $v){
        $new_data = $data;
        $new_ar = $ar;

        array_splice($new_data,$k,1);
        $new_ar[] = $v;

        permutation($new_data,$new_ar);
    }
}

function sortAndFindNextOneOrMinimum($data,$value){
    sort($data);
    $ar = array_unique($data);
    $ar = array_values($ar);
    $index = array_search($value,$ar);
    return $ar[($index + 1) % count($ar)];
}

foreach(range(1,2) as $index){
    $file = file_get_contents("./STDIN{$index}.txt");

    $lines = explode(PHP_EOL,$file);

    $n = array_shift($lines);

    $data = [];

    foreach(range(1,$n) as $i){
        $nn = array_shift($lines);
        $t = explode(" ",array_shift($lines));
        $ar = [];
        foreach(range(1,$nn) as $j){
            $ar[] = $t[$j-1];
        }
        $abc = [];
        permutation($ar);
        $data[] = sortAndFindNextOneOrMinimum($abc,implode('',$t));
    }
    file_put_contents("./STDOUT{$index}.txt",implode(PHP_EOL,$data));
}