<?php
include 'connection.php';
session_start();

if (!isset($_SESSION['uid'])) {
    header("location:login.php");
}

if ($_POST) {
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $address = $_POST['address'];
    $payment = $_POST['payment'];
    $date = date("d-m-y");
    $status = "Confirm";
    $uid = $_SESSION['uid'];

    //shipping order master
    $orderquery = mysqli_query($connection, "insert into tbl_order_master(order_date, order_status, user_id, shipping_name, shipping_number, shipping_address, payment_mode) values('{$date}','{$status}','{$uid}','{$name}','{$mobile}','{$address}','{$payment}')");

    // inserted record id
    $orderid = mysqli_insert_id($connection);

    // order details
    // fetch cart data
    $cartq = mysqli_query($connection, "select * from tbl_cart where user_id = '{$uid}'");
    while ($cartdata = mysqli_fetch_array($cartq)) {
        // cart data
        $pid = $cartdata['product_id'];
        $qty = $cartdata['product_qty'];
        // product data
        $productq = mysqli_query($connection, "select * from tbl_product where product_id = '{$pid}'");
        $pdata = mysqli_fetch_array($productq);
        $price = $pdata['product_price'];   
        $orderdetailq = mysqli_query($connection, "insert into tbl_order_details(order_id,product_id, product_qty, product_price) values('{$orderid}','{$pid}','{$qty}','{$price}')");

        //cart remove
       // mysqli_query($connection, "delete from tbl_cart where cart_id = '{$cartdata['cart_id']}'");
    }
    header("location:thanks.php");
}
?>
<html>

<head>
    <link rel="stylesheet" href="css/checkout.css">
</head>

<body>
    <form action="" Method="POST">
        <div class="checkout-container">
            <!-- Shipping Section -->
            <div class="section shipping-section">
                <h1>Shipping Details</h1>
                <div class="input-grid">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" required placeholder="Enter your full name">
                    </div>

                    <div class="form-group">
                        <label>Mobile</label>
                        <input type="text" name="mobile" required placeholder="Enter your mobile number">
                    </div>

                    <div class="form-group input-full">
                        <label>Address</label>
                        <textarea name="address" required placeholder="Enter your complete address"></textarea>
                    </div>
                </div>
            </div>

            <!-- Payment Section -->
            <div class="section payment-section">
                <div class="payment-methods">
                    <h2>Payment Method</h2>
                    <label class="radio-option">
                        Cash on Delivery
                        <input type="radio" name="payment" value="COD" required>
                        <span class="checkmark"></span>
                    </label>

                    <label class="radio-option">
                        Online Payment
                        <input type="radio" name="payment" value="Online" required>
                        <span class="checkmark"></span>
                    </label>
                </div>

                <div class="qr-code-section">
                    <h2>Scan to Pay</h2>
                    <img src="images/Dwip qr.png" alt="QR Code">
                </div>
            </div>

            <!-- Submit Button Section -->
            <div class="section">
                <button type="submit" name="submit" class="submit-btn">Place Order</button>
            </div>
        </div>
    </form>
</body>

</html>