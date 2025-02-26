<?php
include 'connection.php';
session_start();
?>
<html>
<style>
    .container1 {
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin: 20px auto;
        width: 80%;
    }

    .container1 h2 {
        font-family: 'Arial', sans-serif;
        font-size: 24px;
        color: #fe9126;
        text-align: center;
        margin-bottom: 20px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    table th,
    table td {
        padding: 12px;
        text-align: left;
        font-size: 14px;
        color: #333;
    }

    table th {
        background-color: #fe9126;
        color: white;
        font-weight: bold;
    }

    table td {
        background-color: #f9f9f9;
        border: 1px solid #ddd;
    }

    table tr:nth-child(even) td {
        background-color: #f1f1f1;
    }

    table tr:hover {
        background-color: #fe9126;
        color: white;
    }

    table td:first-child {
        font-weight: bold;
    }
</style>

<body>
    <?php
    include 'header.php';
    ?>
    <div class="container1">
        <h2>Feedback Records</h2>
        <table>
            <thead>
                <tr>
                    <th>Feedback ID</th>
                    <th>Feedback Date</th>
                    <th>Feedback Details</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($_SESSION['uid'])) {
                    $uid = $_SESSION['uid'];
                    $selectq = mysqli_query($connection, "select * from tbl_feedback where user_id = '{$uid}'") or die(mysqli_error($connection));
                    $count = mysqli_num_rows($selectq);
                    echo $count . " Record founded";
                    while ($productrow = mysqli_fetch_array($selectq)) {
                        echo "<tr>";
                        echo "<td>" . $productrow['feedback_id'] . "</td>";
                        echo "<td>" . $productrow['feedback_date'] . "</td> ";
                        echo "<td>" . $productrow['feedback_details'] . "</td>";
                        echo "</tr>";
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
    <?php
    include 'footer.php';
    ?>
</body>

</html>