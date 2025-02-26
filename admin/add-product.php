<?php
$connection = mysqli_connect("localhost", "root", "", "db_supermarket");
if (isset($_POST['btnsubmit'])) {
    $filename = $_FILES['file123']['name'];
    $tempname = $_FILES['file123']['tmp_name'];
    move_uploaded_file($tempname, "uploads/" . $filename);
    $name = $_POST['name'];
    $price = $_POST['price'];
    $category = $_POST['category-id'];
    $details = $_POST['details'];

    $query = mysqli_query($connection, "insert into tbl_product(product_name, product_price, category_id, product_image, product_details) values('{$name}', '{$price}', '{$category}', '{$filename}', '{$details}')");
    if ($query) {
        echo "<script>alert('Product Added Successfully')</script>";
    } else {
        echo "<script>alert('Error in Adding Product')</script>";
    }
}
?>
<html>
    <body>
        <head>
        <link rel="stylesheet" type="text/css" href="product.css">
        </head>
        <form method="post" enctype="multipart/form-data">
            Name: <input type="text" name="name" required><br>
            Price: <input type="number" name="price" required><br>
            Category ID :
            <?php
            $cq = mysqli_query($connection,"select * from tbl_category");
            echo "<select name='category-id'>";
            echo "<option value=''>Select Category</option>";
            while($row = mysqli_fetch_array($cq)){
                echo "<option value='".$row['category_id']."'>".$row['category_name']."</option>";
            }
            echo "</select> <br>";
            ?>
            Image: <input type="file" name="file123" required><br>
            Detais: <textarea name="details"></textarea><br>
            <input type="submit" name="btnsubmit" value="Add Product">
        </form>
    </body>
</html>