<?php
require_once 'Logger.php';

class LoggerBrowser extends Logger
{
    public $param;

    public function __construct($param){
        $this ->param = $param;
    }

    public function write($str)
    {
       echo $this->param.' '.$str."</br>";
    }
}