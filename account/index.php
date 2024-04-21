<?php
    session_start();
    if (isset($_SESSION['user_id'])) {
        echo '<script>alert("You had successfully signed in.");';
        echo 'window.location.href = "http://localhost/Assignment/index.php";</script>'; 
        exit(); 
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href = "../css/styles.css">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caudex:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <title>Instrulicious Online Store | Account Menu</title>
</head>
<body>
    <?php include ("../includes/header.php"); ?>
    <?php include('../includes/navigation.php'); ?>
    
    <br><br><br><br>  
    
    <?php
        if (isset($_SESSION['error_message'])) {
            echo $_SESSION['error_message'];
            unset($_SESSION['error_message']); // Clear the error message after displaying it
        }     
	?>
    <br>

    <div class = "loginPage">
        <h1>Log In</h1> 
        <form action = "logindb.php" method="post" id = "loginForm">
            <div id = "emailInput">
                <label>Email</label>
                <input type = "text" name = "email" id = "email" placeholder = "Enter Email">
                <div class = "error"></div>
            </div>
            <br>
            <div id = "passwordInput">
                <label>Password</label>
                <input type = "password" name = "password" id = "password" placeholder = "Enter Password">
                <div class = "error"></div>
            </div>
            <br>
            
            <br>
            <button type="submit">Login</button>  
            <br><br>
            <a href = "register.php">Don't have an account?</a>  
        </form>
        <script src="validationLogin.js"></script>
    </div>


    <br><br><br><br>  
    <?php include('../includes/footer.php'); ?>
</body>
</html>