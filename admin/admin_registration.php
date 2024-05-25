<?php
include("../config/config.php");

if (isset($_POST['admin_registration'])) {
    $admin_name = mysqli_real_escape_string($con, $_POST['admin_name']);
    $admin_email = mysqli_real_escape_string($con, $_POST['admin_email']);
    $admin_password = mysqli_real_escape_string($con, $_POST['admin_password']);
    $confirm_password = mysqli_real_escape_string($con, $_POST['confirm_password']);

    // Check if the admin account already exists
    $check_query = "SELECT * FROM `admin_table` WHERE admin_name = '$admin_name' OR admin_email = '$admin_email'";
    $result = mysqli_query($con, $check_query);
    $row_count = mysqli_num_rows($result);

    if ($row_count > 0) {
        echo "<script>alert('Admin already has an account');</script>";
    } elseif ($admin_password !== $confirm_password) {
        echo "<script>alert('Passwords do not match');</script>";
    } else {
        // Hash the password before storing it in the database
        $hashed_password = password_hash($admin_password, PASSWORD_DEFAULT);

        $insert_query = "INSERT INTO `admin_table` (admin_name, admin_email, admin_password) VALUES ('$admin_name', '$admin_email', '$hashed_password')";
        $result = mysqli_query($con, $insert_query);

        if ($result) {
            echo "<script>alert('Admin added successfully');</script>";
            echo "<script>window.open('index.php','_self')</script>";
        } else {
            echo "<script>alert('An error occurred while registering the admin');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <form action="" class="form" method="post" enctype="multipart/form-data">
        <div class="single-form">
            <label for="admin_name">Admin Name</label>
            <input name="admin_name" type="text" placeholder="Enter your username" required>
        </div>
        <div class="single-form">
            <label for="admin_email">Admin Email</label>
            <input name="admin_email" type="email" placeholder="Enter your email" required>
        </div>
        <div class="single-form">
            <label for="admin_password">Password</label>
            <input class="admin_password" name="admin_password" type="password" placeholder="Enter your password"
                required>
        </div>
        <div class="single-form">
            <label for="confirm_password">Confirm Password</label>
            <input type="password" name="confirm_password" placeholder="Confirm password" required>
        </div>

        <input type="submit" value="Register" name="admin_registration" class="btn">
        <p>Have an account? <a href="./admin_login.php">Login</a></p>
    </form>
</body>

</html>