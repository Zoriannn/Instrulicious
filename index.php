<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href = "css/styles.css">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caudex:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <title>Instrulicious Online Store | Home</title>
    <style>

    </style>
</head>
<body>
    <?php include('includes/header.php'); ?>
    <?php include('includes/navigation.php'); ?>
    <?php session_start(); ?>
    <br><br><br>
    <section class="container-slide">
        <div class="slider-wrapper">
            <div class="slider">
                <img id="slide-1" src="img/img_1.jpg" alt="first_img"/>
                <img id="slide-2" src="img/img_2.jpg" alt="second_img"/>
                <img id="slide-3" src="img/img_3.jpg" alt="third_img"/>
            </div>
            <div class="slider-nav">
                <a href="#slide-1"></a>
                <a href="#slide-2"></a>
                <a href="#slide-3"></a>
            </div>
        </div>
    </section>
    <br><br><br>
    <div class="row">
        <div class="column">
            <div class="card">
                <h2><b>Fast & Free Shipping</b></h2>
                <br>
                <h4>Enjoy free shipping on all orders</h4>
            </div>
        </div>
        <div class="column">
            <div class="card">
                <h2><b>Buy Now, Pay Later</b></h2>
                <br>
                <h4>Split your purchase into multiple payments</h4>
            </div>
        </div>
        <div class="column">
            <div class="card">
                <h2><b>14 Days Return</b></h2>
                <br>
                <h4>Enjoy free shipping on all orders</h4>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <?php include('includes/footer.php'); ?>
</body>
</html>