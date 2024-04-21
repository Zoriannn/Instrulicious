<?php
session_start();
include "../assets/db_connect.php";

if (isset($_GET['product_name'])) {
    $product_name = $_GET['product_name'];

    // Assuming 'product_id' is the primary key attribute
    // Construct SQL query to retrieve product_id based on product_name
    $sql = "SELECT product_id FROM products WHERE product_name = ?";
    
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        // Bind the parameter and execute the query
        $stmt->bind_param("s", $product_name);
        $stmt->execute();
        $stmt->store_result();

        // Bind the result variable to fetch the product_id
        $stmt->bind_result($productID);

        // Fetch the product_id
        $stmt->fetch();
        
        // Close the statement after fetching the result
        $stmt->close();

        // Prepare and execute the delete query for the cart
        $sql_delete = "DELETE FROM cart WHERE product_id = ?";
        $stmt_delete = $conn->prepare($sql_delete);

        if ($stmt_delete) {
            $stmt_delete->bind_param("i", $productID);
            $stmt_delete->execute();

            if ($stmt_delete->affected_rows > 0) {
                echo "Item removed from the cart.";
                // Redirect back to the product page or wherever needed
                header("Location: ../productList/readCart.php");
                exit(); // Add exit after header redirect to stop further execution
            } else {
                echo "Failed to remove item from the cart.";
            }
            
            $stmt_delete->close();
        } else {
            echo "Error: " . $conn->error;
        }
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
} 
?>
