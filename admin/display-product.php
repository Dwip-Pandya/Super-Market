<?php
$connection = mysqli_connect("localhost", "root", "", "db_supermarket");
$q = mysqli_query($connection, "select * from tbl_product");

echo "<table border='1'>";
echo "<tr>";
echo "<th>Product ID</th>";
echo "<th>Product Name</th>";
echo "<th>Product Price</th>";
echo "<th>Category ID</th>";
echo "<th>Product Image</th>";
echo "<th>Product Details</th>";
echo "</tr>";

while($data = mysqli_fetch_array($q)){
    $cq = mysqli_query($connection, "select * from tbl_category where category_id = '{$data['category_id']}'");
    $cdata = mysqli_fetch_array($cq);
    echo "<tr>";
    echo "<td>{$data['product_id']}</td>";
    echo "<td>{$data['product_name']}</td>";
    echo "<td>{$data['product_price']}</td>";
    echo "<td>{$cdata['category_name']}</td>";
    echo "<td><a href = 'uploads/{$data['product_image']}' target = '_blank'>
    <img width = '100' heigt = '100' src = 'uploads/{$data['product_image']}'></a></td>";
    echo "<td>{$data['product_details']}</td>";
    echo "</tr>";
}
echo "</table>";
?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="display.css">
    </head>
</html>