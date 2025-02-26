<?php
include 'connection.php';
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title>whishlist</title>
    <style>
        /* Styling for the cart table */
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
            background-color: white;
            border: 1px solid #fe9126;
            font-family: Arial, sans-serif;
        }

        table th,
        table td,
        h1 {
            border: 1px solid #fe9126;
            padding: 10px;
            text-align: center;
            font-size: 14px;
        }

        table th {
            background-color: #fe9126;
            color: white;
            text-transform: uppercase;
            font-weight: bold;
        }

        table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        table tr:nth-child(odd) {
            background-color: #fff;
        }

        table tr:hover {
            background-color: #ffe5cc;
        }

        table td a {
            color: #fe9126;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s;
        }

        table td a:hover {
            color: #cc7400;
        }

        table img {
            max-width: 100px;
            border-radius: 5px;
        }
    </style>
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
    <!-- start-smoth-scrolling -->
</head>

<!-- header -->
<?php
include 'header.php';
?>
<!-- breadcrumbs -->
<div class="breadcrumbs">
    <div class="container">
        <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
            <li><a href="index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
            <li class="active"></li>Category</li>
        </ol>
    </div>
</div>
<!-- //breadcrumbs -->
<!--- pakagedfoods --->
<div class="products">
    <div class="container">
        <?php
        //include 'connection.php';
        //session_start();

        $userid = $_SESSION['uid'];
        if (!isset($_SESSION['uid'])) {
            header("location:login.php");
        }

        // delete item from cart
        if (isset($_GET['did'])) {
            $did = $_GET['did'];
            $did = mysqli_query($connection, "delete from tbl_whishlist where whishlist_id = '{$_GET['did']}'");
        }
        echo "<h1 style='color:  #fe9126;'>Your Wishlist</h1>";
        $query = mysqli_query($connection, "select * from tbl_whishlist where user_id = '{$userid}'");
        // only show the cart items of the logged in user

        $count = mysqli_num_rows($query);
        if ($count > 0) {
            echo "<table border='1'>";
            echo "<tr>";
            echo "<th>Sr. No</th>";
            echo "<th>Product Name</th>";
            echo "<th>Product Image</th>";
            echo "<th>Product Price</th>";
            echo "<th>Remove product</th>";
            //echo "<th>Your User ID</th>";
            $i = 0;
            echo "</tr>";
            while ($data = mysqli_fetch_array($query)) {
                $pq = mysqli_query($connection, "select * from tbl_product where product_id = '{$data['product_id']}'");
                $pdata = mysqli_fetch_array($pq);
                $i++;
                echo "<tr>";
                echo "<td>$i</td>";
                echo "<td>{$pdata['product_name']}</td>";
                echo "<td><img src = 'admin/uploads/{$pdata['product_image']}'  width='150'></td>";
                echo "<td>{$pdata['product_price']}</td>";
                echo "<td><a href='whishlist.php?did={$data['whishlist_id']}'> Remove Product </a></td>";
                echo "</tr>";
            }
            echo "</table>";
            echo "<br>";
        } else {
            echo "No items in whishlist";
        }
        echo '<a href="shop.php" style="color: white; text-decoration: none; font-weight: bold; padding: 5px 5px; background-color: #fe9126; border-radius: 0px; border: 2px solid #fe9126">Continue Shopping</a>';
        ?>
    </div>
</div>
<?php
include 'footer.php';
?>
</body>

</html>