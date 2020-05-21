<?php

include "brainfuck.html";

$arr = array(0,0,0,0,0);
$y = 0;

$num_of_words = 0;

$n = 0;

$code = $_REQUEST['code'];
$param = $_REQUEST['params'];
$p = 0;

$string = "";

for ($i = 0; $i < strlen($code); $i++) {
    $n = $arr[$y];
    if($code[$i] == ">")
        $y++;
    else if($code[$i] == "<")
        $y--;
    else if($code[$i] == "+"){
        $n = ($n+1)%256;
        $arr[$y] = $n;
    }
    else if($code[$i] == "-"){
        $n = ($n-1)%256;
        $arr[$y] = $n;
    }
    else if($code[$i] == ",") {
        $arr[$y] = ord($param[$p]);
        $p++;
    }
    else if($code[$i] == "["){
        if ($arr[$y] == 0){
            $b = 1;
            while ($b != 0){
                $i++;
                if($code[$i] == "]")
                    $b--;
                else if($code[$i] == "[")
                    $b++;
            }
        }
    }
    else if($code[$i] == "]"){
        if ($arr[$y] != 0){
            $b = 1;
            while ($b != 0){
                $i--;
                if ($code[$i] == "[")
                    $b--;
                else if ($code[$i] == "]")
                    $b++;
            }
        }
    }
    else if ($code[$i] == "."){
        $num_of_words++;
        $string = chr($arr[$y]);
        echo $string;
    }
    else if($code[$i])
        $y++;
}
