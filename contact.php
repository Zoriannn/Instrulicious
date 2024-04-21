<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href = "css/styles.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caudex:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <title>Instrulicious Online Store | Contact Us</title>

    <style>
        .contact{
            min-height: 100vh;
            background-color: #e8f0fe;
            padding: 50px;
            text-align: center;
        }

        .container-contact{
            max-width: 880px;
            margin:0 auto;
        }

        .container-contact h2{
            font-size: 36px;
            margin-bottom: 40px;
            color: #333;
        }

        .contact-wrapper{
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            grid-gap:30px;
        }

        .contact-form{
            text-align: left;
        }

        .contact-form h3{
            font-size: 24px;
            margin-bottom: 20px;
            color: #333;
        }

        .form-group-contact{
            margin-bottom: 20px;
        }

        input, textarea{
            width: 100%;
            padding: 12px;
            border-radius: 8px;
            border: none;
            background-color: #f8f9fa;
            color: #333;
        }

        input:focus,
        textarea:focus{
            outline:none;
            box-shadow: 0 0 8px #bbb;
        }

        button{
            display: inline-block;
            padding: 12px 24px;
            background-color: #4caf50;
            color: #fff;
            border: 2px;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover{
            background-color: #45a049
        }

        .contact-info{
            text-align: left;
        }

        .contact-info h3{
            font-size: 24px;
            margin-bottom: 20px;
            color: #333;
        }

        .contact-info p{
            margin-bottom: 10px;
            color: #555;
        }

        .contact-info i{
            color: #4caf50;
            margin-right: 10px;
        }

        @media screen and (max-width: 768px){
            .container-contact{
                padding:20px;
            }

            .contact-wrapper{
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <?php include('includes/header.php'); ?>
    <?php include('includes/navigation.php'); ?>
    <section class = "contact">
        <div class="container-contact">
            <h2>Contact Us</h2>
            <div class = "contact-wrapper">
                <div class = "contact-form">
                    <h3>Send us a message</h3>
                    <form method="post" id="contact-form">
                        <div class="form-group-contact">
                            <input type="text" name="name" id="name"placeholder="Your Name"required>
                            <span class="error-message"></span> 
                        </div>
                        <div class="form-group-contact">
                            <input type="text" name="email" id="email"placeholder="Your Email" required>
                            <span class="error-message"></span> 
                        </div>
                        <div class="form-group-contact">
                            <textarea name="message" name="message" id="message" cols="30" rows="10" placeholder="Your Message" required></textarea>
                            <span class="error-message"></span> 
                        </div>
                        <button type="submit">Send Message</button>
                    </form>
                    
                </div>
                <div class="contact-info">
                    <h3>Contact Information</h3>
                    <p><i class="fas fa-phone"></i>+60195228919</p>
                    <p><i class="fas fa-envelope"></i>sales@instrulicious.com.my</p>
                    <p><i class="fas fa-map-marker-alt"></i>
                    Unit No S-25 Level 3,
                    Emporis, Taman Sains Selangor,
                    Kota Damansara,
                    47810 Petaling Jaya, Selangor
                    </p>
                </div>
            </div>
        </div>
    </section>  

    <script src="validationContact.js"></script>
    <?php include('includes/footer.php'); ?>
</body>
</html>