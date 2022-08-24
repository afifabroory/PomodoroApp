<?php
    // include "../db/connection.php";

    // if ($_SERVER['REQUEST_METHOD'] === 'GET') {    
    //     if (!empty($_GET['user']) && !empty($_GET['pass'])) {
    //         $user_tb_query = mysqli_query(DB_CONN, "SELECT * FROM user WHERE username = '$_GET[user]' AND password = '$_GET[pass]'");
            
    //         if (mysqli_affected_rows(DB_CONN) == 1) {
    //             echo "<script>alert('Login success')</script>";
    //         } else {
    //             echo "<script>alert('Login failed')</script>";
    //         }
    //     }
    // }

    include_once "./view/signin.view.php";
?>