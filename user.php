<?php
session_start();
$connection = mysqli_connect("localhost", "root", "", "db_supermarket");
if (isset($_POST['btnsubmit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pswd = $_POST['pswd'];

    $query = mysqli_query($connection, "insert into tbl_user(user_name, user_email, user_password) values('{$name}', '{$email}', '{$pswd}')");
    if ($query) {
        echo "<script>alert('User Added Successfully')</script>";
    } else {
        echo "<script>alert('Error')</script>";
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
        input[type="text"],
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
        input[type="text"]:focus,
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

    <head>
        <link rel="stylesheet" type="text/css" href="product.css">
    </head>
    <form method="post" enctype="multipart/form-data">
        Name: <input type="text" name="name" required><br>
        E-Mail: <input type="email" name="email" required><br>
        Password: <input type="password" name="pswd" required><br>
        <input type="submit" name="btnsubmit" value="Sign Up">
    </form>
</body>

</html>