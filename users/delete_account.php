<?php
if(isset($_POST['delete_account']))

?>
<form action="" method="post">

    <input type="submit" value="delete account" class="btn" name="delete">
    <input type="submit" value="not delete account" class="btn" name="not_delete">
</form>


<?php 




$username_session = $_SESSION['username'];
if(isset($_POST['delete'])){
    $delete_query = "delete from `user` where username='$username_session'";
    $result = mysqli_query($con,$delete_query);
    if($result){
   session_unset();
session_destroy();
    echo "<Script>alert('account deleted')</Script>";
    echo "<Script>window.open('../index.php','_Self')</Script>";
    }


}
if(isset($_POST['not_delete'])){
    echo "<Script>window.open('profile.php','_Self')</Script>";

}

 



?>