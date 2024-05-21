<?php 
include("../config/config.php");
if(isset($_POST['insert_brand'])){
    $brand_title = $_POST['brand_title'];
    
    $select_query = "SELECT * FROM `brands` WHERE `brand_title`='$brand_title'";
    $result_select = mysqli_query($con, $select_query);
    $number=mysqli_num_rows($result_select);
    if($number > 0){
          echo "<script>alert('the brand is in side the data base')</script>";
    }
else{
    $insert_query = "INSERT INTO `brands` (brand_title) VALUES ('$brand_title')";
    $result = mysqli_query($con, $insert_query);
    
    if($result){
        // success message
        echo "<script>alert('added successfully')</script>";
    } 
}
}
?>

<form action="" method="post" class="form">
    <div class="input-container">
        <label for="brands">brand</label>
        <input type="text" placeholder="Add brands" name="brand_title">
    </div>
    <input type="submit" name="insert_brand" value="Add brand">
</form>