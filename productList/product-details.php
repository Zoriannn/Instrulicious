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
        <title>Instrulicious Online Store | Product Details</title>

       <style>
            .containerProduct input {
                border-radius: 10px;
                background-color: #eee;
                width: 40px;
                height: 40px;
                font-size: 20px;
                text-align: right;
                margin-top: 5%;
                padding-left: 5px;
            }
            .col-lg-6 {
                padding: 20px;
            }
        </style>
    </head>
    <body>
        <?php
            include("../includes/header.php");
            include("../includes/navigation.php");
            session_start(); 

            if (isset($_GET["product_id"])) {
                
                $product_id = $_GET["product_id"];

                include ("../assets/db_connect.php");

                $sql = "SELECT * FROM products WHERE product_id = $product_id";
                $result = $conn->query($sql);

                if ($result && $result->num_rows > 0) {
                    $row = $result->fetch_assoc();

                    echo '  <div class="containerProduct">';
                    echo '      <div class="row gx-5">';
                    echo '          <div class="col-lg-6">';
                    echo '              <div class="product-image"><img src="' . $row["product_image_link"] . '" alt="' . $row["product_name"] . '"></div>';
                    echo '          </div>';
                    echo '          <div class="col-lg-6">';
                    echo '              <div class="product-info">';
                    echo '                  <div class="product-title">' . $row["product_name"] . '</div>';
                    echo '                  <div class="product-description">' . $row['product_desc'] . '</div>';
                    echo '                  <div class="product-price">RM ' . $row["price"] . '</div>';
                    echo '                  <div class="product-brand">Brand: ' . $row["brand_name"] . '</div><br><br>';
                    echo '                  <a href="addToCart.php?product_id=' . $row["product_id"] . '"><button class="add-to-cart-button">Add to Cart</button></a>'; 
                    echo '              </div>';
                    echo '          </div>';
                    echo '      </div>';
                    echo '  </div>';

                } else {
                    echo "Product not found.";
                }
                $conn->close();
            } else {
                echo '<script>alert("No product ID provided.");';
                echo 'window.location.href = "http://localhost/Assignment/productList/product.php";</script>';
                exit();
            }
            include("../includes/footer.php");
        ?>
     
    </body>
</html>

