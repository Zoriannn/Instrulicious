
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caudex:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <title>Instrulicious Online Store | Cart</title>
</head>
<body>
<?php
include('../includes/header.php'); 
include('../includes/navigation.php'); ?>

<div id="Paymentsuccess-message">
    <h2>Payment successful!</h2>

    <a href="http://localhost/Assignment/index.php">
        <h3>Back to Home Page</h3>
    </a>
</div>

<?php include("../includes/footer.php");?>
</body>
</html>


<?php
    session_start(); 
    include "../assets/db_connect.php";
    
    if (isset($_POST['user_id'])) {
        $user_id = $_POST['user_id'];

        $sql = "DELETE FROM cart WHERE user_id = ?";

        $stmt = $conn->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("i", $user_id);
            $stmt->execute();

            if ($stmt->affected_rows > 0) {
                echo "Item removed from the cart.";
            } 
            
        } else {
            echo "Error: " . $conn->error;
        }
 
        $stmt->close();
        $conn->close();
    } 
?>
