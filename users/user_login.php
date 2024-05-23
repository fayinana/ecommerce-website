<?php 
include('../functions/common_function.php');
include('../config/config.php'); 

@session_start();
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
            <label for="password">password</label>
            <input type="password" name="user_password" id="password" placeholder="enter password" autocomplete="off"
                required="required">
        </div>


        <input type="submit" value="login" class="btn" name="user_login">
        <p>don't have an account <a href="../users/registration.php">register</a></p>

    </form>
</body>

</html>


<?php 

if (isset($_POST['user_login'])) {
    $user_username = $_POST['user_username'];
    $user_password = $_POST['user_password'];

$select_query="SELECT * FROM `user` WHERE username='$user_username'"; 
$result = mysqli_query($con ,$select_query);
$row_count=mysqli_num_rows($result);
$row_data =mysqli_fetch_assoc($result);
$user_ip= getRealIPAddr();

$select_query_cart="SELECT * FROM `cart` WHERE ip_address='$user_ip'"; 
$select_cart=mysqli_query($con,$select_query_cart);
$row_count_cart=mysqli_num_rows($select_cart);

if($row_count > 0){
if (password_verify($user_password,$row_data['user_password'])) {
    $_SESSION['username'] = $user_username;
    if($row_count == 1 and $row_count_cart==0){
        $_SESSION['username'] = $user_username;
        echo "<script>alert('login successfully')</script>";
        echo "<script>window.open('profile.php','_self')</script>";
    }
    
    else{
        $_SESSION['username'] = $user_username;
        echo "<script>alert('login successfully')</script>";
        echo "<script>window.open('payment.php','_self')</script>";
    }
    
}
else{
    echo "<script>alert('invalid password')</script>";

}
}
else{
    echo "<script>alert('invalid user')</script>";
}
}

?>