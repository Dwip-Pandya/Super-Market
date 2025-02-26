<?php
include 'connection.php';
session_start();
$userid = $_SESSION['uid'];

?>
<!DOCTYPE html>
<html>

<head>
    <title>Order Master</title>
    <!-- for-mobile-apps -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Super Market Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- //for-mobile-apps -->
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/feedback.css" rel="stylesheet" type="text/css" media="all" />
    <!-- font-awesome icons -->
    <link href="css/font-awesome.css" rel="stylesheet">
    <!-- //font-awesome icons -->
    <!-- js -->
    <script src="js/jquery-1.11.1.min.js"></script>
    <!-- //js -->
    <link href='//fonts.googleapis.com/css?family=Raleway:400,100,100italic,200,200italic,300,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
    <!-- start-smoth-scrolling -->
    <script type="text/javascript" src="js/move-top.js"></script>
    <script type="text/javascript" src="js/easing.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event) {
                event.preventDefault();
                $('html,body').animate({
                    scrollTop: $(this.hash).offset().top
                }, 1000);
            });
        });
    </script>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            font-size: 18px;
            text-align: left;
            background-color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        th,
        td {
            padding: 12px 15px;
            border: 1px solid #ddd;
        }

        th {
            background-color: #fe9126;
            color: white;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #ffe5c2;
        }

        a {
            text-decoration: none;
            color: #fe9126;
            font-weight: bold;
            transition: color 0.3s ease;
        }

        a:hover {
            color: #d5791f;
        }

        caption {
            margin-bottom: 10px;
            font-size: 20px;
            font-weight: bold;
            color: #fe9126;
        }
    </style>
    <!-- start-smoth-scrolling -->
</head>

<body>
    <!-- header -->
    <?php
    include 'header.php';
    ?>
    <?php
    if (!isset($_SESSION['uid'])) {
        header("location:login.php");
    }

    echo "<h1 style='color:  #fe9126;'>Your Order Details</h1>";

    $query = mysqli_query($connection, "select * from tbl_order_details where order_id = '{$userid}'");

    $count = mysqli_num_rows($query);
    if ($count > 0) {
        echo "<table border='1'>";
        echo "<tr>";
        echo "<th>Order Detail Id</th>";
        echo "<th>Order Id</th>";
        echo "<th>Product Id</th>";
        echo "<th>Product QTY</th>";
        echo "<th>Product Price</th>";
        echo "</tr>";
        while ($data = mysqli_fetch_array($query)) {
            $pq = mysqli_query($connection, "select * from tbl_order_details where order_details_id = '{$data['order_details_id']}'");
            $pdata = mysqli_fetch_array($pq);
            echo "<tr>";
            echo "<td>{$pdata['order_details_id']}</td>";
            echo "<td>{$pdata['order_id']}</td>";
            echo "<td>{$pdata['product_id']}</td>";
            echo "<td>{$pdata['product_qty']}</td>";
            echo "<td>{$pdata['product_price']}</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
    // cart remove
    if (isset($_POST['shop'])) {
        mysqli_query($connection, "delete from tbl_cart where user_id = '{$userid}'");
    }
    ?>
    <!-- breadcrumbs -->
    <form action="shop.php" method="post">
        <input type="submit" name="shop" value="Go to Shop">
    </form>
    <?php
    include 'footer.php';
    ?>
</body>

</html>