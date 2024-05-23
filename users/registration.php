<?php 

include('../functions/common_function.php');

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <form action="" class="form" method="post" enctype="multipart/form-data">

        <div class="single-form">
            <label for="name">username</label>
            <input type="text" name="user_username" id="name" placeholder="enter user name" autocomplete="off"
                required="required">
        </div>
        <div class="single-form">
            <label for="email">email</label>
            <input type="text" name="user_email" id="email" placeholder="enter email" autocomplete="off"
                required="required">
        </div>
        <div class="single-form">
            <label for="image">image</label>
            <input type="file" name="user_image" id="email" autocomplete="off" required="required">
        </div>
        <div class="single-form">
            <label for="password">password</label>
            <input type="password" name="user_password" id="password" placeholder="enter password" autocomplete="off"
                required="required">
        </div>
        <div class="single-form">
            <label for="conform_password">conform password</label>
            <input type="password" name="conform_user_password" id="password" placeholder="conform password"
                autocomplete="off" required="required">
        </div>
        <div class="single-form">
            <label for="address">address</label>
            <input type="address" name="user_address" id="address" placeholder="address" autocomplete="off"
                required="required">
        </div>
        <div class="single-form">
            <label for="contact">contact</label>
            <input type="contact" name="user_contact" id="contact" placeholder="contact" autocomplete="off"
                required="required">
        </div>

        <input type="submit" value="register" class="btn" name="user_register">
        <p class="recommendation">already have an account <a href="user_login.php">login</a></p>

    </form>
</body>

</html>




<?php
if (isset($_POST['user_register'])) {
    $user_username = $_POST['user_username'];
    $user_email = $_POST['user_email'];
    $user_image = $_FILES['user_image']['name'];
    $user_image_tmp = $_FILES['user_image']['tmp_name'];
    $user_password = $_POST['user_password'];
    $conform_user_password = $_POST['conform_user_password'];
    $user_address = $_POST['user_address'];
    $user_contact = $_POST['user_contact'];
    $user_ip = getRealIPAddr();

//    selection

$select_query = "SELECT * FROM user WHERE username = '$user_username' OR user_email = '$user_email'";
$result= mysqli_query($con,$select_query);
$row_count = mysqli_num_rows($result);

if ($row_count > 0) {
    echo "<script>alert('user name already exist')</script>";
}
 else if ($user_password != $conform_user_password) {
            echo "<script>alert('password is not match')</script>";

    } 
else{

    
    // insertion
    move_uploaded_file($user_image_tmp,"./users_image/$user_image");
    $insert_query = "INSERT INTO user (username, user_email, user_password, user_image, user_ip, user_address, user_mobile)
                VALUES ('$user_username', '$user_email', '$user_password', '$user_image', '$user_ip', '$user_address', '$user_contact')";

$sql_execute = mysqli_query($con,$insert_query); 

if($sql_execute){
    echo "<script>alert('user added successfully')</script>";
}
else{
    echo "<script>alert('user not added')</script>";   
}
}
}
?>