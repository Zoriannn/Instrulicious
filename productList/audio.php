<?php
include ("../assets/db_connect.php");

// Query to select all products from the database
$sql = "SELECT product_id, product_name, product_image_link, price FROM products WHERE product_category = 'audio'";
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
   
    <nav class="sidebar">
        <div class="sidebar-link"><a href="product.php">All Products</a></div>
        <div class="sidebar-link"><a href="piano-keyboard.php">Piano & Keyboard</a></div>
        <div class="sidebar-link"><a href="guitar.php">Guitar</a></div>
        <div class="sidebar-link"><a href="amplifier.php">Amplifier</a></div>
        <div class="sidebar-link"><a href="audio.php">Audio</a></div>
    </nav>

    <main>
        <p class="number-of-results">
            <?php
            // Logic to count total products (replace with your actual logic)
            $sql_total_products = "SELECT COUNT(*) AS total_products FROM products";
            $result_total = $conn->query($sql_total_products);

            $total_products = 0;
            if ($result_total->num_rows > 0) {
                $row_total = $result_total->fetch_assoc();
                $total_products = $row_total["total_products"];
            }

            echo $result->num_rows . " out of " . $total_products . " results";
            ?>
        </p>    

        <section class="product-grid">
        <?php
        // Loop through product results and display them in cards
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
            echo '<div class="product-preview">';
            echo '  <div class="product-image">';
            echo '    <a href="product-details.php?product_id=' . $row["product_id"] . '" target="_blank">';  // Include product ID in product details link
            echo '      <img class="thumbnail" src="' . $row["product_image_link"] . '" alt="' . $row["product_name"] . '">';
            echo '    </a>';
            echo '  </div>';
            echo '  <div class="product-info">';
            echo '    <div class="product-title">' . $row["product_name"] . '</div>';
            echo '    <div class="product-price">RM ' . $row["price"] . '</div>';
            echo '    <div class="operations">';
            echo '      <a href="addToCart.php?product_id=' . $row["product_id"] . '"><button class="add-to-cart-button">Add to Cart</button></a>';
            echo '    </div>';
            echo '  </div>';
            echo '</div>';
            }
        } else {
            echo "No products found.";
        }
        ?>
        </section>
    </main>

    <?php include('../includes/footer.php'); ?>
</body>
</html>

<?php

// Close the database connection
$conn->close();

?>