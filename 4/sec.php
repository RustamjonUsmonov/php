<?php

function weighted_random_simple($values, $weights,$from=0){
    $count = count($values);
    $from = 0;
    $n = 0;
    $num = mt_rand(1, array_sum($weights));
    while($from < $count){
        $n += $weights[$from];
        if($n >= $num){
            break;
        }
        $from++;
    }
    yield $values[$from];
}

function control($sent_no_num,$weights_arr){
    $counter= array_fill(0, count($sent_no_num), 0);

    for ($i=0;$i<10000;$i++){
        $p=weighted_random_simple($sent_no_num,$weights_arr);

        foreach ($p as $item){
            for ($o=0;$o<count($sent_no_num);$o++){
                if($item==$sent_no_num[$o] ){
                    $counter[$o]++;
                }
            }
        }
    }
    $keys=array('text','count','probability');
    $data=array();
    $temp=array();
    for ($l=0;$l<count($sent_no_num);$l++){
        array_push($temp,$sent_no_num[$l]);
        array_push($temp,$counter[$l]);
        array_push($temp,($counter[$l]/array_sum($counter)));

        array_push($data,array_combine($keys,$temp));
        $temp=array();
    }
    return json_encode($data);
}
