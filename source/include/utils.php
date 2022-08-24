<?php

function rand_str($n) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
  
    for ($i = 0; $i < $n; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $randomString .= $characters[$index];
    }
  
    return $randomString;
}

function uuid() {
    return mysqli_fetch_array(mysqli_query(DB_CONN, "SELECT uuid()"))[0];
}

function set_login_cookies($uuid, $user) {
    $session_tb_query = mysqli_query(DB_CONN,
        "DELETE FROM login_session WHERE
         user = '$user' AND expires < NOW()");

    if ($session_tb_query) {
        $session_tb_query = mysqli_query(DB_CONN,
            "INSERT login_session VALUE
             ('$uuid', '$user', '$_SERVER[REMOTE_ADDR]', NULL, NULL)");
    
        if ($session_tb_query)
            setcookie('session', $uuid, time() + 3600 * 3, '/');
        else
            "Something wrong";
    } else 
        echo "Something wrong";

}