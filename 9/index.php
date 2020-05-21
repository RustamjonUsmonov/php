<?php
setlocale(LC_ALL, "ru_RU.UTF-8");
require_once 'LoggerBrowser.php';
require_once 'LoggerFile.php';

if (isset($_REQUEST['submit'])){
    $text = $_REQUEST['str'];

    if(isset($_REQUEST['log'])){
        $log = $_REQUEST['log'];

        $lines = explode(PHP_EOL, $text);
        $lines = change($lines);

        if ($log == 'browser'){
            date_default_timezone_set ( "Europe/Moscow" );
            if (isset($_REQUEST['date'])) {
                $date = $_REQUEST['date'];
                if ($date == "time"){
                    $logger = new LoggerBrowser(date('H:i:s'));
                } elseif ($date == "date_time"){
                    $logger = new LoggerBrowser(date('d m Y H:i:s'));
                }else{
                    $logger = new LoggerBrowser('');
                }
                foreach ($lines as $line) {
                    $logger->write($line);
                }
            }else{
                echo "Выберите параметр";
            }
        }elseif ($log == "file"){
            if($_REQUEST['filename']){
                $file_name = $_REQUEST['filename'];
                $logger = new LoggerFile($file_name);
                foreach ($lines as $line) {
                    $logger->write($line);
                }
            } else {
                echo "Введите имя файла";
            }
        }

    } else{
        echo "выберите логгер";
    }
} else {
    include '9.html';
}

function change($lines){
    $arr = [];
    for ($i = 0; $i < count($lines); $i++) {
        if (preg_match('/[A-ZА-Я]/u', $lines[$i])) {
            $arr[$i] = "Строка: ".$lines[$i]." содержит заглавные буквы";
        } else{
            $arr[$i] = "Строка: ".$lines[$i]." не содержит заглавных букв";
        }
    }
    return $arr;
}
