<?php
    require_once "../db/connection.php";

    include_once "../include/mail.php";
    include_once "../include/otp.php";
    include_once "../include/utils.php";

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // In assumption $_POST are also validated using JavaScript

        if (!empty($_POST['fname']) || !empty($_POST['usname']) &&
            !empty($_POST['email']) && !empty($_POST['pass']) && 
            !empty($_POST['cfpass']) && !empty($_POST['submit'])) {

                if ($_POST['cfpass'] !== $_POST['pass']) 
                    header('location: registration.php');

                $user  = mysqli_escape_string(DB_CONN, $_POST['usname']);
                $name  = mysqli_escape_string(DB_CONN, 
                            ($_POST['fname'] === '' ? $_POST['usname'] : $_POST['fname']));
                $email = mysqli_escape_string(DB_CONN, $_POST['email']);
                $pass  = password_hash($_POST['pass'], PASSWORD_DEFAULT);
        
                // Get UUID from MySQL
                $uuid = uuid();
                
                // Generate OTP
                $otp = get_otp();
                $otpverif_tb_query = mysqli_query(DB_CONN,
                    "INSERT otp_verification VALUE ('$uuid', '0', '$otp', NULL, NULL)");

                if ($otpverif_tb_query) {
                    $user_tb_query = mysqli_query(DB_CONN, 
                        "INSERT user VALUE 
                         ('$user', '$name', '$email', '$pass', NULL, '$uuid', NULL)");

                    if ($user_tb_query) {
                        // Send OTP email
                        // email: secure.mypomdoro@gmail.com
                        // pass : I$xd$2o#^$eZ0B2I4DpOdRb1jGtMaNalc2^u3k40Eof3ih*&Qk

                        if (send_mail($_POST['email'], $otp)) {
                            session_start();
                            $_SESSION['email'] = htmlspecialchars($_POST['email']);
                            $_SESSION['usname'] = htmlspecialchars($_POST['usname']);
                            $_SESSION['name'] = htmlspecialchars($_POST['fname']);
                            $_SESSION['verified'] = false;
                            $_SESSION['otp_id'] = $uuid;

                            
                            // Create cookies login session
                            set_login_cookies(uuid(), $user);

                            header('Location: verify.php');
                        }
                        else
                            echo "Email sending failed...";
                    } else 
                        echo "Failed to insert user into table";
                } else 
                    echo "Failed to insert verification into table";


                    
        }
    }

    include_once "view/registration.view.php";
?>