<?php
session_start(); 
include "../assets/db_connect.php";
  
if (isset($_GET['quantity']) && isset($_GET['product_id'])) {
    $quantity = $_GET['quantity'];
    $product_id = $_GET['product_id'];
    
    // Prepare the SQL statement with placeholders
    $sql = "UPDATE cart SET product_quantity = ? WHERE product_id = ?";
    
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        // Bind parameters and execute the statement
        $stmt->bind_param("ii", $quantity, $product_id);
        $stmt->execute();

        if ($stmt->affected_rows === 1) {
            echo '<script>alert("Item quantity updated successfully.");</script>';
            echo '<script>window.location.href = "http://localhost/Assignment/productList/readCart.php";</script>';
            exit();

        } else {
            echo '<script>alert("Failed to update item quantity. Please try again later.");</script>';
            echo '<script>window.location.href = "http://localhost/Assignment/productList/readCart.php";</script>';
        }
    } else {
        echo "Error: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo '<script>alert("Quantity and user ID are required.");</script>';
    echo '<script>window.location.href = "http://localhost/Assignment/productList/readCart.php";</script>';
    exit();
}
?>
