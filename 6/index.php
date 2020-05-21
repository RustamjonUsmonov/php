<?php
$array_ini = parse_ini_file('index.ini', true);

$first_rule_symbol = $array_ini['first_rule']['symbol'];
$first_rule = $array_ini['first_rule']['upper'];
$second_rule_symbol = $array_ini['second_rule']['symbol'];
$second_rule = $array_ini['second_rule']['direction'];
$third_rule_symbol = $array_ini['third_rule']['symbol'];
$third_rule = $array_ini['third_rule']['delete'];
$file_name = $array_ini['main']['filename'];

if(file_exists($file_name)) {
    $file_list = file($file_name);
} else{
    echo "File not found";
}
foreach ($file_list as $value){
    $rule = substr($value, 0, 3);
    $str = trim(substr($value, 3));

    if($rule === $first_rule_symbol){
        if($first_rule === "true"){
            echo strtoupper($str).'<br/>';
        } else if($first_rule === "false"){
            echo strtolower($str).'<br/>';
        }
    } else if ($rule === $second_rule_symbol){
        if($second_rule == '+'){
            for ($i = 0; $i < strlen($str); $i++){
                if ($str[$i] >= '0' && $str[$i] < '9'){
                    echo $str[$i] + 1;
                } elseif ($str[$i] == '9'){
                    echo '0';
                } else {
                    echo $str[$i];
                }
            }
        } elseif($second_rule == '-') {
            for ($i = 0; $i < strlen($str); $i++){
                if ($str[$i] > '0' && $str[$i] <= '9'){
                    echo $str[$i] - 1;
                } elseif ($str[$i] == '0'){
                    echo '9';
                } else {
                    echo $str[$i];
                }
            }
        }
        echo '<br/>';
    } else if($rule === $third_rule_symbol){
        for ($i = 0; $i < strlen($str); $i++){
            if($str[$i] !== $third_rule){
                echo $str[$i];
            }
        }
        echo '<br/>';
    } else {
        echo $value.'<br/>';
    }
}