<?php 
    session_start(); 
    include "../assets/db_connect.php";

    if (isset($_POST['name']) && isset($_POST['phone'])&& isset($_POST['email']) && isset($_POST['password'])) {
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Check if the email is already registered
        $check_email_query = "SELECT * FROM user WHERE email=?";
        $check_email_stmt = $conn->prepare($check_email_query);
        $check_email_stmt->bind_param("s", $email);
        $check_email_stmt->execute();
        $check_email_result = $check_email_stmt->get_result();

        if ($check_email_result->num_rows > 0) {
            $_SESSION['error_message'] = "<div class='error-message'>Email is already registered. Please use a different email.</div>";
            header("Location: register.php"); 
            exit();
        } else {
            // Insert new user into the database
            $insert_query = "INSERT INTO user (user_name, email, password, phone) VALUES (?, ?, ?, ?)";
            $insert_stmt = $conn->prepare($insert_query);
            $insert_stmt->bind_param("ssss", $name, $email, $password, $phone);
            $insert_stmt->execute();

            // Set session variables for the new user
            $_SESSION['name'] = $name;
            $_SESSION['email'] = $email;
            $_SESSION['phone'] = $phone;
            
            header("Location: registerSuccess.php"); 
            exit();
        }
    }
?>