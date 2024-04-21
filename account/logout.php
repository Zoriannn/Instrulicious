<?php 
    session_start(); 
    include "../assets/db_connect.php";

    if (isset($_SESSION['user_id'])) {
        session_destroy();
        echo '<script>alert("You have logged out successfully.");</script>';
        echo '<script>window.location.href = "http://localhost/Assignment/index.php";</script>';
        exit();
    } else {
        echo '<script>alert("You have not logged in.");</script>';
        echo '<script>window.location.href = "http://localhost/Assignment/account/index.php";</script>';
        exit();
    }
?>