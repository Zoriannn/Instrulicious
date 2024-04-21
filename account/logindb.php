<?php 
    session_start(); 
    include "../assets/db_connect.php";

    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Protect against SQL injection by using prepared statements
        $sql = "SELECT * FROM user WHERE email=? AND password=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $email, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['user_name'] = $row['user_name'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['phone'] = $row['phone'];
            header("Location: http://localhost/Assignment/index.php");
            exit();
        } else {
            // Invalid email or password
            $_SESSION['error_message'] = "<div class='error-message'>Invalid email or password. Please try again.</div>";
            header("Location: index.php"); 
            exit();
        }
    }
?>





