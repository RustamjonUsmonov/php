<?php

function weighted_random_simple($values, $weights){
    $count = count($values);
    $i = 0;
    $n = 0;
    $num = mt_rand(1, array_sum($weights));
    while($i < $count){
        $n += $weights[$i];
        if($n >= $num){
            break;
        }
        $i++;
    }
    return $values[$i];
}

function control($sent_no_num,$weights_arr){
    $counter= array_fill(0, count($sent_no_num), 0);

    for ($i=0;$i<10000;$i++){
        $p=weighted_random_simple($sent_no_num,$weights_arr);

        for ($o=0;$o<count($sent_no_num);$o++){
            if($p==$sent_no_num[$o] ){
                $counter[$o]++;
            }
        }
    }
    $keys=array('text','count','probability');
    $data=array();
    $temp=array();
    for ($l=0;$l<count($sent_no_num);$l++){
        array_push($temp,$sent_no_num[$l]);
        array_push($temp,$counter[$l]);
        array_push($temp,($weights_arr[$l]/array_sum($weights_arr)));

        array_push($data,array_combine($keys,$temp));
        $temp=array();
    }
    return json_encode($data);
}
