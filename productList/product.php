<?php
include ("../assets/db_connect.php");

// Query to select all products from the database
$sql = "SELECT * FROM products";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="icon" href="http://localhost/Assignment/favicon.ico" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caudex:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <title>Instrulicious Online Store | Products</title>
</head>
<body>
    <?php include('../includes/header.php'); ?>
    <?php include('../includes/navigation.php'); ?>
    <?php session_start(); ?>
    
    <nav class="sidebar">
        <p class="product-type">Product Types</p>
        <div class="sidebar-link"><a href="product.php">All Products</a></div>
        <div class="sidebar-link"><a href="piano-keyboard.php">Piano & Keyboard</a></div>
        <div class="sidebar-link"><a href="guitar.php">Guitar</a></div>
        <div class="sidebar-link"><a href="amplifier.php">Amplifier</a></div>
        <div class="sidebar-link"><a href="audio.php">Audio</a></div>
    </nav>

    <main>

        <div>
        <p class="number-of-results">Showing all products </p>
        <div class="icons-container">
            <div class="icon-cart">
            <a href = "../productList/readCart.php" >
                <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 15a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm0 0h8m-8 0-1-4m9 4a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-9-4h10l2-7H3m2 7L3 4m0 0-.792-3H1"/>
                </svg>
            </a>
            </div>
        </div>
        </div>
       
        <section class="product-grid">
        <?php
      
        // Loop through product results and display them in cards
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
            echo '<div class="product-preview">';
            echo '  <div class="product-image">';
            echo '    <a href="product-details.php?product_id=' . $row["product_id"] . '">';  // Include product ID in product details link
            echo '      <img class="thumbnail" src="' . $row["product_image_link"] . '" alt="' . $row["product_name"] . '">';
            echo '    </a>';
            echo '  </div>';
            echo '  <div class="product-info">';
            echo '    <div class="product-title">' . $row["product_name"] . '</div>';
            echo '    <div class="product-price">RM ' . $row["price"] . '</div>';
            echo '  </div>';
            echo '    <div class="operations">';
            echo '      <a href="addToCart.php?product_id=' . $row["product_id"] . '"><button class="add-to-cart-button">Add to Cart</button></a>'; 
            echo '    </div>';
            echo '</div>';
            }
        } else {
            echo "No products found.";
        }
        ?>
        </section>         
        
    </main>

    <?php include ("../includes/footer.php") ?>

    <script src="sidebar-scroll.js"></script>

</body>
</html>

<?php

// Close the database connection
$conn->close();

?>
 
 