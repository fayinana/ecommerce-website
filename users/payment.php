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
</head>

<body>

    <?php 

$user_ip = getRealIPAddr();
$get_user = "SELECT * FROM `user` WHERE `user_ip`='$user_ip'";
$result = mysqli_query($con,$get_user);
$run_query = mysqli_fetch_array($result);
$user_id = $run_query['user_id'];

?>



    <div class="payment-methods">
        <p>other</p>
        <a href="order.php?user_id=<?php echo $user_id ?>">
            <p>offline</p>
        </a>
    </div>
</body>

</html>