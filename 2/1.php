<?php

$c=$_POST['text'];

function simple($str,$from=0)
{
    $count = 0;
    for ($i = $from; $i < strlen($str); $i++) {
        if ($str[$i] == 'h') {
            $str[$i] = 4;
            $count += 1;
        } elseif ($str[$i] == 'o') {
            $str[$i] = 0;
            $count += 1;
        } elseif ($str[$i] == 'l') {
            $str[$i] = 1;
            $count += 1;
        }elseif ($str[$i] == 'e') {
            $str[$i] = 3;
            $count += 1;
        }
        yield $str[$i];
    }
    echo $count."</br>";
}
function pucs($str){
    $string ="";
    foreach (simple($str) as $val){
        $string.=$val;
    }
    return $string;
}
$result=pucs($c);
echo  $result;
