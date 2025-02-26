<?php
include 'connection.php';
?>
<head>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/font-awesome.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/skdslider.css">
</head>

<div class="logo_products">
    <div class="container">
        <div class="w3ls_logo_products_left1">
            <ul class="phone_email">
                <li><i class="fa fa-phone" aria-hidden="true"></i>Order online or call us : (+91) 8320036370</li>

            </ul>
        </div>
        <div class="w3ls_logo_products_left">
            <h1><a href="index.html">super Market</a></h1>
        </div>
        <div class="w3l_search">
            <form action="#" method="post">
                <input type="search" name="Search" placeholder="Search for a Product..." required="">
                <button type="submit" class="btn btn-default search" aria-label="Left Align" name="searchbtn">
                    <i class="fa fa-search" aria-hidden="true"> </i>
                </button>
                <div class="clearfix"></div>
            </form>
        </div>

        <div class="clearfix"> </div>
    </div>
</div>
<!-- //header -->
<!-- navigation -->
<div class="navigation-agileits">
    <div class="container">
        <nav class="navbar navbar-default">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header nav_2">
                <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="shop.php" class="act">Home</a></li>
                    <!-- Mega Menu -->
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Category<b class="caret"></b></a>
                        <ul class="dropdown-menu multi-column columns-3">
                            <div class="row">
                                <div class="multi-gd-img">
                                    <ul class="multi-column-dropdown">
                                        <h6>All Groceries</h6>
                                        <?php
                                        $categoryq = mysqli_query($connection, "select * from tbl_category");
                                        while ($cdata = mysqli_fetch_array($categoryq)) {
                                            echo "<li><a href='shop.php?categoryid={$cdata['category_id']}'><i class='fa fa-arrow-right' aria-hidden='true'></i>{$cdata['category_name']}</a></li>";
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                        </ul>
                    </li>
                    <li><a href="shop.php">Shop</a></li>
                    <li><a href="contact.html">Contact</a></li>
                    <?php
                    if (isset($_SESSION['uid'])) {

                    ?>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Hi, <?php echo $_SESSION['uname'] ?><b class="caret"></b></a>
                            <ul class="dropdown-menu multi-column columns-3">
                                <div class="row">
                                    <div class="multi-gd-img">
                                        <ul class="multi-column-dropdown">
                                            <li><a href='feedbackdisplay.php'>See Your Feedbacks</a></li>
                                            <li><a href='cart.php'>Your Cart</a></li>
                                            <li><a href='logout.php'>Logout</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </ul>
                        </li>
                    <?php
                        // $name = $_SESSION['uname'];
                        // echo "<li><a href='login.php'>Hi, $name</a></li>";
                    } else {
                        echo '<li><a href="login.php">Login</a></li>';
                    }
                    ?>
                    <li><a href="cart.php">Your Cart</a></li>
                    <li><a href="feedback.php">Add Feedback</a></li>
                </ul>
            </div>
        </nav>
    </div>
</div>