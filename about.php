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
    <title>Instrulicious Online Store | About Us</title>
    <style>

        #img-about{
            height:90%;
            width: 90%;
            border-radius: 10%;
        }

        p{
            font-size: 18px;
        }
        
        .container {
            display: flex;
            flex-wrap: wrap;
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }

        .text-side {
            flex: 1;
            margin-right: 2rem;
        }

        .image-side {
            flex: 1;
            margin-right: 1rem;
        }

        .image-side img {
            max-width: 100%;
            height: auto;
        }

        @media (max-width: 768px) {
        .container {
        flex-direction: column;
        }

        .text-side,
        .image-side {
        flex: 100%;
        margin: 0;
        }

        .image-side img {
        height: auto;
        width: 100%;
        }
        }
    </style>
</head>
<body>
    <?php include('includes/header.php'); ?>
    <?php include('includes/navigation.php'); ?>
    <div class="container">
        <div class="text-side">
            <h1>Our Story</h1>
            <p>In 2023, Instrulicious came to life as a modest jamming studio nestled in Bintulu, devoted to serving the local community of musicians. As our love for music ignited and our horizons expanded, we embarked on a new path- offering a curated selection of musical instruments. Today, with pride and gratitude, we have flourished into a network of branches spread across Malaysia. Throughout our remarkable journey, our unwavering mission has remained constant: to provide unparalleled service and create extraordinary moments for every customer we have the pleasure of serving.</p>
        </div>
        <div class="image-side">
            <img src="img/pic2.png" id = "img-about" alt="about_img1">
        </div>
    </div>
    <div class="container">
        <div class="image-side">
            <img src="img/pic3.png" id = "img-about" alt="about_img2">
        </div>
        <div class="text-side">
            <h1>Our Mission</h1>
            <p>At Instrulicious, our mission is to deliver unmatched service and create extraordinary musical moments for every customer. We understand the transformative power of music and are dedicated to providing an exceptional experience. Whether you're a beginner or an experienced musician, we're committed to meeting your needs, offering expert guidance, and helping you find the perfect instrument. Trust us to be your partner on your musical journey, inspiring and uplifting you with unforgettable moments.</p>
        </div>
  </div>
  <?php include('includes/footer.php'); ?>
</body>
</html>