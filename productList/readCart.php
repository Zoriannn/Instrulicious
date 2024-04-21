<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caudex:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <title>Instrulicious Online Store | Your Cart</title>
</head>
<body>
<?php
    include('../includes/header.php'); 
    include('../includes/navigation.php');
    
    session_start();
    include ("../assets/db_connect.php");

    $cartItems = [];
    if (isset($_SESSION['user_id'])) {
        // Access user information from the session
        $userID = $_SESSION['user_id'];
        $sql = "SELECT c.cart_id AS id, 
                    c.user_id, 
                    p.product_id, 
                    p.product_name, 
                    p.price,
                    p.product_image_link AS image_url,
                    c.product_quantity AS quantity, 
                    (p.price * c.product_quantity) AS total
                FROM cart c 
                JOIN products p ON c.product_id = p.product_id 
                WHERE c.user_id = $userID";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $cartItems = $result->fetch_all(MYSQLI_ASSOC);
        } else {
            echo '<script>alert("Cart is empty");';
            echo 'window.location.href = "http://localhost/Assignment/productList/product.php";</script>';
            exit();
        }
        
    } else {
        echo '<script>alert("Please log in to add items to your cart.");</script>';
        echo '<script>window.location.href = "http://localhost/Assignment/account/index.php";</script>';
        exit();
    }

?>

<div class="container-cart">
    <div id="cart-container">
        <h2>Your Cart</h2>
        <table id="cart-table">
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($cartItems as $item){?>
                    <tr data-item-id="<?php echo $item['product_id']; ?>">
                        <td>
                            <img src="<?php echo $item['image_url']; ?>" alt="<?php echo $item['product_name']; ?>" style="width: 50px; height: 50px;">
                            <?php echo $item['product_name']; ?><br>
                        </td>

                        <td class="item-price" data-price="<?php echo $item['price']; ?>">$<?php echo $item['price']; ?></td>
                        
                        <td>
                            <input type="number" class="item-quantity" value="<?php echo $item['quantity']; ?>" min="1" onchange="updateTotal(this)">
                            <button class="updateButton" onclick="updateQuantity(<?php echo $item['product_id']; ?>)">Update</button>
                        </td>

                        <td class="item-total">RM<?php echo $item['total']; ?></td>

                        <td>
                            <a href = "removeItem.php?product_name=<?php echo $item['product_name']; ?>">
                                <button class="remove-item-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 16 16"><path fill="currentColor" fill-rule="evenodd" d="M5.75 3V1.5h4.5V3zm-1.5 0V1a1 1 0 0 1 1-1h5.5a1 1 0 0 1 1 1v2h2.5a.75.75 0 0 1 0 1.5h-.365l-.743 9.653A2 2 0 0 1 11.148 16H4.852a2 2 0 0 1-1.994-1.847L2.115 4.5H1.75a.75.75 0 0 1 0-1.5zm-.63 1.5h8.76l-.734 9.538a.5.5 0 0 1-.498.462H4.852a.5.5 0 0 1-.498-.462z" clip-rule="evenodd"/></svg>
                                </button>
                            </a>
                        </td>
                    </tr>
               
                    <?php } ?>

                <tr class="total-row">
                    <td colspan="3">Total:</td>
                    <td id="cart-total">RM<?php 
                        $total = array_sum(array_column($cartItems, 'total'));
                        echo $total;
                    ?></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>



<div id="checkout-section">
    <h2>Shipping & Payment Information</h2>
<form onsubmit="return validateForm()" method="post" action="removeCart.php">
        <div class="form-group">
            <label for="receiver-name">Receiver's Name</label>
            <input type="text" id="receiver-name" name="receiver-name" required>
            <span class="error" id="receiver-name-error"></span> <!-- Error message placeholder -->
        </div>
        <div class="form-group">
            <label for="receiver-contact">Receiver's Contact</label>
            <input type="text" id="receiver-contact" name="receiver-contact" required>
            <span class="error" id="receiver-contact-error"></span> <!-- Error message placeholder -->
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <textarea id="address" name="address" required></textarea>
            <span class="error" id="address-error"></span> <!-- Error message placeholder -->
        </div>
        <div class="form-group">
            <label for="postcode">Postcode</label>
            <input type="text" id="postcode" name="postcode" required>
            <span class="error" id="postcode-error"></span> <!-- Error message placeholder -->
        </div>
        <div class="form-group">
            <label for="state">State</label>
            <select id="state" name="state" required>
                <option value="">Select State</option>
                <option value="Johor">Johor</option>
                <option value="Kedah">Kedah</option>
                <option value="Kelantan">Kelantan</option>
                <option value="Melaka">Melaka</option>
                <option value="Negeri Sembilan">Negeri Sembilan</option>
                <option value="Pahang">Pahang</option>
                <option value="Perak">Perak</option>
                <option value="Perlis">Perlis</option>
                <option value="Pulau Pinang">Pulau Pinang</option>
                <option value="Sabah">Sabah</option>
                <option value="Sarawak">Sarawak</option>
                <option value="Selangor">Selangor</option>
                <option value="Terengganu">Terengganu</option>
                <option value="Kuala Lumpur">Kuala Lumpur</option>
                <option value="Labuan">Labuan</option>
                <option value="Putrajaya">Putrajaya</option>
            </select>
            <span class="error" id="state-error"></span> <!-- Error message placeholder -->
        </div>
        <div class="form-group">
            <label for="payment-method">Payment Method</label>
            <select id="payment-method" name="payment-method" required>
                <option value="">Select Payment Method</option>
                <option value="card">Debit/Credit Card</option>
                <option value="Touch 'n Go">Touch 'n Go</option>
                <option value="Bank Transfer">Bank Transfer</option>
            </select>
            <span class="error" id="payment-method-error"></span> <!-- Error message placeholder -->
        </div>
		<input type="hidden" name="user_id" value="<?php echo $item['user_id']; ?>">
        <button type="submit" class="checkout-btn">Check Out</button>
    </form>
</div>

</div>

<script>

    function updateQuantity(productId) {
        var newQuantity = document.querySelector('.item-quantity').value;
        var url = "updateQuantity.php?quantity=" + newQuantity + "&product_id=" + productId;
        window.location.href = url;
    }

    function updateTotal(input) {
        var row = input.parentNode.parentNode; // Get the parent row of the input
        var price = parseFloat(row.querySelector('.item-price').getAttribute('data-price')); // Get the product price
        var quantity = parseInt(input.value); // Get the new quantity
        var total = price * quantity; // Calculate the new total
        row.querySelector('.item-total').innerHTML = 'RM' + total.toFixed(2); // Update the total display

        // Update cart total
        var cartItems = document.querySelectorAll('.item-total');
        var cartTotal = 0;
        cartItems.forEach(function(item) {
            cartTotal += parseFloat(item.innerHTML.replace('RM', ''));
        });
        document.getElementById('cart-total').innerHTML = 'RM' + cartTotal.toFixed(2);

    }


	function validateForm() {
    var receiverName = document.getElementById("receiver-name").value;
    var receiverContact = document.getElementById("receiver-contact").value;
    var address = document.getElementById("address").value;
    var postcode = document.getElementById("postcode").value;
    var state = document.getElementById("state").value;
    var paymentMethod = document.getElementById("payment-method").value;

    var nameRegex = /^[A-Za-z\s]+$/; 
    var postcodeRegex = /^[0-9]{5}$/; 
    var phoneRegex = /^[0-9]{10}$/;

    var isValid = true;

    // Clear previous error messages
    document.getElementById("receiver-name-error").innerHTML = "";
    document.getElementById("receiver-contact-error").innerHTML = "";
    document.getElementById("address-error").innerHTML = "";
    document.getElementById("postcode-error").innerHTML = "";
    document.getElementById("state-error").innerHTML = "";
    document.getElementById("payment-method-error").innerHTML = "";

    // Validate Receiver's Name
    if (!receiverName.match(nameRegex)) {
        document.getElementById("receiver-name-error").innerHTML = "Receiver's Name should only contain letters and spaces";
        isValid = false;
    }

    // Validate Receiver's Contact
    if (!receiverContact.match(phoneRegex)) {
        document.getElementById("receiver-contact-error").innerHTML = "Receiver's Contact is required";
        isValid = false;
    }

    // Validate Address
    if (address.trim() === "") {
        document.getElementById("address-error").innerHTML = "Address is required";
        isValid = false;
    }

    // Validate Postcode
    if (!postcode.match(postcodeRegex)) {
        document.getElementById("postcode-error").innerHTML = "Invalid Postcode. Please enter a 5-digit number.";
        isValid = false;
    }

    // Validate State
    if (state === "") {
        document.getElementById("state-error").innerHTML = "Please select a state";
        isValid = false;
    }

    // Validate Payment Method
    if (paymentMethod === "") {
        document.getElementById("payment-method-error").innerHTML = "Please select a payment method";
        isValid = false;
    }

    return isValid;
}

</script>

<?php 

$conn->close();
include("../includes/footer.php");
?>
</body>
</html>