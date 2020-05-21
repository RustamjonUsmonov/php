<?php
if(isset($_REQUEST['month'])){
    $month = $_REQUEST['month'];
    $date = new DateTime();
    $year =  $date -> format('Y');
    $day = '';
    if (($month == $date -> format('m'))){
      $day = $date ->  format('j');
    }
    $date = new DateTime("$year-$month-01 00:00:00");
    $dayOfWeek = $date -> format('w');
    $arr = createCalendar($dayOfWeek, $month, $year);
    printCalendar($arr, $day);
}else {
    include "my.html";
}

function createCalendar($dayOfWeek, $month, $year){
    $number = cal_days_in_month(CAL_GREGORIAN, $month, $year);
    $arr = [];
    $arr[0] = ['Пн', 'Вт', 'Ср', 'Чт', 'Пт', 'Сб', 'Вс'];
    $arr[1] = ['', '', '', '', '', '', ''];

    if ($dayOfWeek > 0){
        $dayOfWeek--;
    }
    if ($dayOfWeek == 0){
        $dayOfWeek = 6;
    }
    $k = 1;
    for ($i = $dayOfWeek; $i < 7; $i++){
        $arr[1][$i] = $k;
        $k++;
    }
    if (($number - $k)%7 != 0){
        $count = ($number - $k)/7;
    } else{
        $count = ($number - $k)/7 + 1;
    }
    for ($i = 2; $i < $count+2; $i++){
        if ($k != $number){
            for ($j = 0; $j < 7; $j++){
                $arr[$i][$j] = $k;
                $k++;
            }
        }
    }
    return $arr;
}

function printCalendar($arr, $day){
    echo "<table>";
    foreach ($arr as $item){
        echo '<tr>';
        foreach ($item as $key => $value) {
            if ($key == 6 || $key == 5){
                echo '<td style="color: red">'.$value."</td>";
            } else if ($day == $value){
                echo "<td><b>".$value."</b></td>";
            } else{
                echo "<td >".$value."</td>";
            }
        }
        echo "</tr>";
    }
    echo "<table>";
}
