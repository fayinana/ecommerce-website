<?php
if (isset($_GET['delete_users'])) {
    $_id = $_GET['delete_users'];

    $delete_query = "delete FROM  `user` where user_id = $user_id";
$delete_result = mysqli_query($con,$delete_query);
    if ($delete_result) {
        bottomNotification('brand is deleted', 'success', 'index.php');

        echo "<script>alert('brand is deleted')</script>";
        echo "<Script>window.open('index.php','_self')</Script>";
    }
}

?>