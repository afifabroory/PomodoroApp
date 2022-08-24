<?php
    define('DB_HOSTNAME', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_NAME', 'pomodoro_app');
    define('DB_PORT', '3306');

    try {
        define('DB_CONN', mysqli_connect(DB_HOSTNAME, DB_USER, DB_PASS, DB_NAME, DB_PORT));
    } catch (Exception $e) {
        echo "Something went wrong with mysqli_connect:\n$e";
    }
    
?>