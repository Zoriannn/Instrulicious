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
    <title>Instrulicious Online Store | Register</title>
</head>
<body>
    <?php include('../includes/header.php'); ?>
    <?php include('../includes/navigation.php'); ?>
    
    <br><br><br><br>  
    <?php
        if (isset($_SESSION['error_message'])) {
            echo $_SESSION['error_message'];
            unset($_SESSION['error_message']); 
        }
        
	?>
    <br>  

    <div class = "registerPage">
        <h1>Registration Form</h1> 

        <form action = "registerdb.php" method="post" id = "registerForm">
            <div id = "nameInput">
                <label>Name</label>
                <input type = "text" name = "name" id = "name" placeholder = "Enter Name">
                <div class = "error"></div>
            </div>
            <br>
            <div id = "phoneInput">
                <label>Phone number</label>
                <input type = "text" name = "phone" id = "phone" placeholder = "Enter Phone Number">
                <div class = "error"></div>
            </div>
            <br>
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
            <div id = "re_passwordInput">
                <label>Re-enter Password</label>
                <input type = "password" name = "re_password" id = "re_password" placeholder = "Re-Enter Password">
                <div class = "error"></div>
            </div>
            <br>
                
            <div class = "agree">
                <input type="checkbox" name="agreeCheckBox" id="agreeCheckBox">I agree to the Terms and Conditions.
                <div class = "error"></div>      
            </div>
            
            <br>
            <button type="submit">Register account</button>  
        </form>
        <script src="validationRegister.js"></script>
    </div>

    <br><br><br><br>  

    <?php include('../includes/footer.php'); ?>
</body>
</html>