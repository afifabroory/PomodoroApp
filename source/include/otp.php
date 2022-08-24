<?php

    function get_otp() {
        return mt_rand(1000, 9999); 
    }