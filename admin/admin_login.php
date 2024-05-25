<?php
include("../config/config.php");

// Start session
session_start();

if (isset($_POST['admin_login'])) {
    $username = mysqli_real_escape_string($con, $_POST['admin_name']);
    $password = mysqli_real_escape_string($con, $_POST['admin_password']);

    $select_query = "SELECT * FROM `admin_table` WHERE admin_name = ?";
    $stmt = mysqli_prepare($con, $select_query);
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row_data = mysqli_fetch_assoc($result);

    if ($row_data && password_verify($password, $row_data['admin_password'])) {
        // Set session variables and redirect to the index page
        $_SESSION['admin_name'] = $row_data['admin_name'];
        echo "<script>alert('Login successful')</script>";
        echo "<script>window.open('./index.php','_self')</script>";
    } else {
        echo "<script>alert('Invalid username or password')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <form action="" class="form" method="post" enctype="multipart/form-data">
        <div class="single-form">
            <label for="user_name">Username</label>
            <input type="text" name="admin_name" placeholder="Enter your username" required>
        </div>

        <div class="single-form">
            <label for="user_name">Password</label>
            <input type="password" name="admin_password" placeholder="Enter your password" required>
        </div>

        <input type="submit" value="Login" name="admin_login" class="btn">
        <p>Don't have an account? <a href="./admin_registration.php">Register</a></p>
    </form>
</body>

</html>