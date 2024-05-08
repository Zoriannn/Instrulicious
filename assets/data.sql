
CREATE DATABASE eCommerce CHARACTER SET utf8 COLLATE utf8_general_ci;

USE eCommerce;

CREATE TABLE user(
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    user_name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    phone VARCHAR(255)
);

INSERT INTO user(user_name, email, password, phone) VALUES 
('Hui Le Yun', 'huileyun0320@1utar.my', 'leyun0320','0123456789'),
('Choo Jia Zheng', 'jzchoo04@1utar.my', 'jzchoo12', '0102030405'),
('Loke Weng Yan', 'wengyan@1utar.my', 'lwy999', '0192837465'),
('Tin Hui Hui', 'huihui@1utar.my', 'hui0000', '0129384756');


CREATE TABLE products (
    product_id INT AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(255) NOT NULL,
    product_category VARCHAR(50) NOT NULL,
    product_desc TEXT,
    price DECIMAL(10, 2) NOT NULL,
    brand_name VARCHAR(255),
    product_image_link VARCHAR(300)
);

INSERT INTO products (product_name, product_category, product_desc, price, brand_name, product_image_link)
VALUES
    ("YAMAHA P-45B 88 KEYS DIGITAL PIANO (P45B / P 45B) FREE KEYBOARD BENCH", "piano_keyboard", "Yamaha's acclaimed Graded Hammer Standard keybed with their time-tested AWM stereo sound engine, delivering the natural feel and sound. Between its compact frame, its USB/MIDI connectivity, and it's onboard performance features, your P-45 will serve you well at home, in the studio, and onstage.", 1999.99, "Yamaha", "https://cdn.shopify.com/s/files/1/1371/8893/products/preview_322e2b98-0b8c-4d5d-8834-9c9257f55e82_large.jpg?v=1676859557"),
    ("FENDER ESC-105 EDUCATIONAL SERIES CLASSICAL ACOUSTIC GUITAR, SATIN VINTAGE NATURAL", "guitar", "Classical guitar with laminated spruce top, okume back and sides, walnut fretboard, flat radius, and white dot inlays. Comes with standard classical strings, open-gear tuners, and gig bag", 709.89, "Fender", "https://cdn.shopify.com/s/files/1/1371/8893/files/products_2FF03-097-1960-121_2FF03-097-1960-121_1707893757920_large.jpg?v=1711170776"),
    ("PRS SE CUSTOM 22 ELECTRIC GUITAR W/CASE, BLACK GOLD SUNBURST", "guitar", "The PRS SE Custom 22 boasts a maple top, mahogany back, and dual 85/15 humbuckers. Complete with a PRS patented tremolo bridge, it offers vintage-inspired tone and modern playability", 4549.50, "PRS", "https://cdn.shopify.com/s/files/1/1371/8893/files/products_2FP13-111909-BG-CU22SHQQIB_2FP13-111909-BG-CU22SHQQIB_1708413616510_large.jpg?v=1711170570"),
    ("IBANEZ AEG61 ACOUSTIC GUITAR - NATURAL MAHOGANY HIGH GLOSS (AEG61-NMH)", "guitar", "AEG body, okoume top/sides. Comfort Grip nyatoh neck, laurel fretboard/bridge. White dot inlay, abalone rosette. Chrome die-cast tuners, 20 frets. Ibanez Advantage™ pins, IACSP6C strings", 1233.00, "Ibanez", "https://cdn.shopify.com/s/files/1/1371/8893/files/products_2FI01-AEG61-NMH_2FI01-AEG61-NMH_1664372197420_large.jpg?v=1708695690"),
    ("FENDER FSR COLLECTION TRADITIONAL 60S PRECISION BASS GUITAR, RW FB, SHELL PINK", "guitar", "Classic Precision Bass® shape with basswood body and vintage-style pickups. Smooth 'U' shape neck, 20 vintage frets, and rosewood fretboard. Includes gig bag", 4949.99, "Fender", "https://cdn.shopify.com/s/files/1/1371/8893/files/products_2FF03-563-3100-356_2FF03-563-3100-356_1710326974010_large.jpg?v=1710744636"),
    ("MARSHALL ST20C STUDIO JTM 20W TUBE COMBO AMPLIFIER", "amplifier", "20/5W, 2-ch 1x12 Tube Guitar Combo Amplifier with Celestion G12M-65 Creamback, 3-band EQ, Presence, DI Out, and FX Loop", 5469.88, "Marshall", "https://cdn.shopify.com/s/files/1/1371/8893/files/products_2FM31-ST20C_2FM31-ST20C_1690371446031_large.jpg?v=1704431951"),
    ("VOX MINI SUPERBEETLE BRITISH RACING GREEN GUITAR AMPLIFIER", "amplifier", "Vox Mini SuperBeetle 25 Limited Edition British Racing Green", 1930, "Vox", "https://cdn.shopify.com/s/files/1/1371/8893/files/ea095e0f79a435279c7f32c2cff5dd75_large.jpg?v=1689815885"),
    ("IBANEZ AUC10E ACOUSTIC-ELECTRIC CONCERT UKULELE - OPEN PORE NATURAL", "guitar", "AU concert body with spruce top, solid paulownia back/sides, and purpleheart fretboard/bridge. Features Ibanez Undersaddle pickup, AEQ2U preamp with onboard tuner, and black die-cast tuners", 994.99, "Ibanez", "https://cdn.shopify.com/s/files/1/1371/8893/files/IBAUC10EOPN_large.jpg?v=1708516969"),
    ("CASIO SA-77 MINI KEYBOARD", "piano_keyboard", "Mini Keyboard with 44 Mini Keys, 100 Tones, 50 Rhythms, and 10 Song Bank Tunes, Designed for Fun and Educational Music Exploration.", 365.50, "Casio", "https://cdn.shopify.com/s/files/1/1371/8893/products/SA-77_Seq1_large.webp?v=1660706179"),
    ("FENDER FSR COLLECTION TRADITIONAL 70S TELECASTER THINLINE ELECTRIC GUITAR, MAPLE FB, VINTAGE WHITE", "guitar", "Vintage White Telecaster Thinline with Maple Fingerboard, Traditional 70s Design for Vintage Charm", 6179.99, "Fender", "https://cdn.shopify.com/s/files/1/1371/8893/files/products_2FF03-563-0302-341_2FF03-563-0302-341_1710397878430_large.jpg?v=1710571003"),
    ("YAMAHA YCM01 CONDENSER MICROPHONE - BLACK", "audio", "Studio Quality Condenser Microphone with Cardioid Polar Pattern, XLR Connection", 645.99, "Yamaha", "https://cdn.shopify.com/s/files/1/1371/8893/files/YamahaYCM01CondenserMicrophone-Black_large.jpg?v=1709135396");

CREATE TABLE cart(
    cart_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    product_id INT NOT NULL,
    product_quantity INT NOT NULL
);

INSERT INTO cart (cart_id, user_id, product_id, product_quantity) VALUES
(1, 3, 1, 1);


