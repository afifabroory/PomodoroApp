<?php
    
    function send_mail($email, $otp) {
        $subject = "Your OTP has arrived!";
                        $content = <<<EOL
                            <p>Use the following OTP Code to complete your registration process. OTP is valid for # minutes</p>
                            <h1 style="border-radius:0.375rem;background: black;margin: 0 auto;width: max-content;padding: 5px 10px;color: #fff;">$otp</h1>
                        EOL;
                        $headers = [
                            'From' => 'secure.mypomdoro@gmail.com',
                            'Content-type' => 'text/html; charset=iso-8859-1',
                        ];
        return mail($email, $subject, $content, $headers);
    }