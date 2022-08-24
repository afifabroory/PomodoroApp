<?php
    require_once "../db/connection.php";
    
    include_once "../include/mail.php";
    include_once "../include/otp.php";

    session_start();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_SESSION['verified']) && !$_SESSION['verified']) {
            
            // Delete expired OTP
            $otpverif_tb_query = mysqli_query(DB_CONN, 
                "DELETE FROM otp_verification WHERE 
                 expires < NOW() AND status = '0' AND NOT uuid = '$_SESSION[otp_id]'");
            if ($otpverif_tb_query) {

                $user_otp = mysqli_real_escape_string(DB_CONN, $_POST['otp']);
                $otpverif_tb_query = mysqli_query(DB_CONN, 
                    "SELECT * FROM otp_verification WHERE 
                     expires > NOW() AND uuid = '$_SESSION[otp_id]' AND code = '$user_otp'");
                if ($otpverif_tb_query) {
                    if (mysqli_affected_rows(DB_CONN)) {
                        $otpverif_tb_query = mysqli_query(DB_CONN, 
                            "UPDATE otp_verification 
                             SET status = '1' WHERE uuid = '$_SESSION[otp_id]'");

                        if ($otpverif_tb_query) {
                            echo "Verified";
                            header('Location: ../index.php');
                            exit;
                        } else 
                            echo "Something wrong";
                    } else {
                        $otp = get_otp();
                        send_mail($_SESSION['email'], $otp);
                        $otpverif_tb_query = mysqli_query(DB_CONN, 
                            "UPDATE otp_verification 
                             SET code = '$otp' WHERE uuid = '$_SESSION[otp_id]'");

                        if ($otpverif_tb_query)
                            echo "Resend successfuly";
                        else 
                            echo "Something wrong";
                    }
                } else
                    echo "Something wrong";
                
            } else
                echo "Something wrong";
        
        } else 
            header('Location: ../index.php');
    }

    include_once "view/verify.view.php";
?>