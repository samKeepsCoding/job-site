<?php
session_start();

    if(isset($_SESSION['userId'])) {

        unset($_Session['userId']);
    }

    header("Location: login.php");
    die;
?>