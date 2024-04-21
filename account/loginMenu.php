<?php 
    session_start(); 
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
    <?php include('../includes/header.php'); ?>
    <?php include('../includes/navigation.php'); ?>


    <?php 
        if (isset($SESSION["user_id"])) {
            echo '<script>alert("You had already log in before.");</script>';
            echo '<script>window.location.href = "http://localhost/Assignment/index.php";</script>';
            exit();
        } 
    ?>


    <br><br><br><br>

    <div class = "loginMenu">
        <form method="post" id="loginMenuForm">
            <h1>Menu</h1>    
            <br>

            <button type="submit" formaction="index.php">Login</button>
            <br><br>
            <button type="submit" formaction="register.php">Register</button>
            <br><br>
        </form>
    </div>
    <br><br><br><br>
    <?php include('../includes/footer.php'); ?>
</body>
</html>