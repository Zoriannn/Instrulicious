<?php 
    session_start(); 
    include "../assets/db_connect.php";
    
    // Check if the user is logged in
    if(isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
        if (isset($_GET['product_id'])) {
            $product_id = $_GET['product_id'];

    
            // Check if the product already exists in the cart
            $check_sql = "SELECT * FROM cart WHERE user_id = $user_id AND product_id = $product_id";
            $check_result = $conn->query($check_sql);

            if ($check_result->num_rows === 1) {
                // If the product already exists in the cart, increment the quantity
                $row = $check_result->fetch_assoc();
                $product_quantity = $row['product_quantity'] + 1;

                // Update the quantity in the database
                $update_sql = "UPDATE cart SET product_quantity = $product_quantity WHERE user_id = $user_id AND product_id = $product_id";
                if ($conn->query($update_sql) === TRUE) {
                    echo '<script>alert("Quantity updated in cart.");</script>';
                } else {
                    echo "Error updating quantity: " . $conn->error;
                }
            } else {
                // If the product does not exist in the cart, insert it with quantity 1
                $insert_sql = "INSERT INTO cart (user_id, product_id, product_quantity) VALUES ($user_id, $product_id, 1)";
                if ($conn->query($insert_sql) === TRUE) {
                    echo '<script>alert("Item added to cart.");</script>';
                } else {
                    echo "Error adding item to cart: " . $conn->error;
                }
            }
            
            // Redirect the user to the product page after updating the cart
            header("Location: http://localhost/Assignment/productList/product.php");
            exit(); 
        } else {
            echo '<script>alert("Product ID is required.</script>");';
        }
    } else {
        echo '<script>alert("Please log in to add items to your cart.");</script>';
        echo '<script>window.location.href = "http://localhost/Assignment/account/index.php";</script>';
        exit();
        
    }
?>
