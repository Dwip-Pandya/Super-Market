<?php
session_start();
$connection = mysqli_connect("localhost", "root", "", "db_supermarket");
if ($_POST) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $q = mysqli_query($connection, "select * from tbl_user where user_email = '{$email}' and user_password = '{$password}'");
    $data = mysqli_fetch_array($q);
    $count = mysqli_num_rows($q);
    if ($count > 0) {
        $_SESSION['uid'] = $data['user_id'];
        $_SESSION['uname'] = $data['user_name'];
        header("location:shop.php");
    } else {
        echo "<script>alert('Login Failed')</script>";
    }
}
?>
<html>

<head>
    <style>
        /* General body styling */
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f0f8ff;
        }

        /* Form container styling */
        form {
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            max-width: 400px;
            width: 100%;
            text-align: center;
        }

        /* Input fields styling */
        input[type="email"],
        input[type="password"] {
            width: calc(100% - 20px);
            padding: 10px;
            margin: 10px 0;
            border: 2px solid #ccc;
            border-radius: 5px;
            transition: border-color 0.3s, box-shadow 0.3s;
            font-size: 16px;
        }

        /* Input fields focus effect */
        input[type="email"]:focus,
        input[type="password"]:focus {
            border-color: #fe9126;
            box-shadow: 0 0 5px #fe9126;
            outline: none;
        }

        /* Submit button styling */
        input[type="submit"] {
            background-color: #fe9126;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s, transform 0.3s;
        }

        /* Submit button hover effect */
        input[type="submit"]:hover {
            background-color: #fe9126;
            transform: scale(1.05);
        }

        /* Animation for form appearance */
        form {
            animation: fadeIn 1s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body>
    <form action="" method="post">
        E-mail : <input type="email" name="email" required><br>
        Password : <input type="password" name="password" required><br>
        <input type="submit"><br><br>
        Don't have Account yet!
        <a href="user.php">Sign Up</a>
    </form>
</body>

</html>