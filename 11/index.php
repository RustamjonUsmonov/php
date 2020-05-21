<?php
use logger\JsonLogger;

require_once '../vendor/autoload.php';

spl_autoload_register(
    function ($classname) {
        include $classname.".php";
    }
);

$logger = new JsonLogger("log.json");

$logger->debug("debug");

$logger->alert("alert");

$logger->log("log", "logger");
?>