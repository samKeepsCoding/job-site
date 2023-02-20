<?php

function check_login ($con) {

    if(isset($_SESSION['userId'])) {

        $userId = $_SESSION['userId'];
        $query = "select * from user where userId = '$userId' limit 1";
        $res = mysqli_query($con, $query);

        if ($res && mysqli_num_rows($res) > 0) {
            $userData = mysqli_fetch_assoc($res);
            return $userData;
        }
    }

    header("Location: login.php");
    die;
}

function isValidEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}



function randomNumber($length) {

    $text = "";
    if($length < 5) {

        $length = 5;
    } 

    $len = rand(4, $length);

    for ( $i=0; $i < $len; $i++) {

        $text .= rand(0,9);

    }

    return $text;
}

