<?php
require_once 'Logger.php';

class LoggerFile extends Logger{
    public $file;
   // public $lines = [];

    public function write($str)
    {
        fwrite($this -> file, $str."\n");
    }

    public function __construct($file_name)
    {
        $this -> file = fopen($file_name, 'w+');
    }

    public function __destruct(){
        fclose($this -> file);
    }

}