<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You</title>
    <style>

        .thank-you-container {
            text-align: center;
            background: #ffffff;
            padding: 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .thank-you-container img {
            width: 150px;
            margin-bottom: 20px;
        }

        .thank-you-container h1 {
            color: #333;
            margin-bottom: 10px;
        }

        .thank-you-container p {
            color: #777;
            font-size: 16px;
            margin-bottom: 20px;
        }

        .thank-you-container a {
            text-decoration: none;
            color: white;
            background-color: #fe9126;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            display: inline-block;
            transition: background-color 0.3s;
        }

        .thank-you-container a:hover {
            text-decoration: none;
            color: #fe9126;
            background-color: #ffffff;
            padding: 10px 20px;
            font-size: 16px;
            border: 3px solid #fe9126;
            border-radius: 5px;
            display: inline-block;
            transition: background-color 0.3s;

        }
    </style>
</head>
<body>
    <?php
    include 'header.php';
    ?>
    <div class="thank-you-container">
        <img src="images/thanks.png" alt="Thank You">
        <h1>Thank You for Your Purchase!</h1>
        <p>Your order has been successfully placed. We appreciate your business.</p>
        <a href="shop.php">Continue Shopping</a>
        <a href="vieworder.php">View Order</a>
    </div>
    <?php
    include 'footer.php';
    ?>
</body>
</html>
