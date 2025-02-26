<?php
include 'connection.php';
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Dog Super Market</title>
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

<body>
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
            <div class="col-md-4 products-left">
                <div class="categories">
                    <h2>Categories</h2>
                    <ul class="cate">
                        <!-- category start -->
                        <?php
                        $categoryq = mysqli_query($connection, "select * from tbl_category");
                        while ($cdata = mysqli_fetch_array($categoryq)) {
                            echo "<li><a href='shop.php?categoryid={$cdata['category_id']}'><i class='fa fa-arrow-right' aria-hidden='true'></i>{$cdata['category_name']}</a></li>";
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <div class="col-md-8 products-right">
                <div class="products-right-grid">
                    <div class="products-right-grids">
                        <div class="clearfix"> </div>
                    </div>
                </div>
                <h1>Products</h1>
                <!-- product start -->
                <div class="agile_top_brands_grids">
                    <?php
                    if (isset($_GET['categoryid'])) {
                        $cid = $_GET['categoryid'];
                        $query = mysqli_query($connection, "select * from tbl_product where category_id = '$cid'");
                    } else if (isset($_POST['searchbtn'])) {
                        $search = $_POST['Search'];
                        $query = mysqli_query($connection, "select * from tbl_product where product_name like '%$search%'");
                        echo "<a href='shop.php'>View all Products</a>";
                    } else {
                        $query = mysqli_query($connection, "select * from tbl_product");
                    }
                    $count = mysqli_num_rows($query);
                    echo "$count Products Found";
                    echo "<br><br>";

                    while ($data = mysqli_fetch_array($query)) {
                    ?>
                        <div class="col-md-4 top_brand_left">
                            <div class="hover14 column">
                                <div class="agile_top_brand_left_grid">
                                    <div class="agile_top_brand_left_grid_pos">
                                        <img src="images/offer.png" alt=" " class="img-responsive">
                                    </div>
                                    <div class="agile_top_brand_left_grid1">
                                        <figure>
                                            <div class="snipcart-item block">
                                                <div class="snipcart-thumb">
                                                    <a href="details.php?pid=<?php echo $data['product_id'] ?>"><img width="150" src="admin/uploads/<?php echo $data['product_image']; ?>"></a>
                                                    <a href="details.php?pid=<?php echo $data['product_id'] ?>">
                                                        <p><?php echo $data['product_name']; ?></p>
                                                    </a>
                                                    <h4>₹<?php echo $data['product_price']; ?></h4>
                                                </div>
                                            </div>
                                        </figure>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                    <!-- product end -->
                </div>
            </div>
        </div>
    </div>
    <!--- pakagedfoods --->
    <!-- //footer -->
    <?php
    include 'footer.php';
    ?>

</body>

</html>