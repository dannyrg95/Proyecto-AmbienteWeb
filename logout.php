<?php 
    include_once('global.php');
    session_start();
    session_unset();
    session_destroy();
    header('location:'. ROOT . '/index.php');
?>