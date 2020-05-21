<?php
function generator($str, &$count){
    for($i = 0; $i < strlen($str); $i++){
        switch ($str[$i]){
            case 'h':
                $count++;
                yield '4';
                break;
            case 'l':
                $count++;
                yield '1';
                break;
            case 'e':
                $count++;
                yield '3';
                break;
            case 'o':
                $count++;
                yield '0';
                break;
            default:
                yield $str[$i];
        }
    }
}

function f($text){
    $counter = 0;
    $out = '';
    foreach (generator($text, $counter) as $value){
        $out .= $value;
    }
    return 'line: '.$out.' count: '.$counter;
}

if(isset($_REQUEST['str'])){
    $text = $_REQUEST['str'];
    echo f($text);
} else {
    require_once '2.php';
}



