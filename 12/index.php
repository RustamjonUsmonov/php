<?php
require_once 'gen.php';
session_start();

if (isset($_REQUEST['btn'])) {
    $str = $_REQUEST['str'];
    if (!isset($_COOKIE['cookie'])) {
        setcookie("cookie", $str, time() + 3600);
        $_COOKIE["cookie"] = $str;
    } else {
        header("Location /index.php?str=$str&btn=Run");
    }
}