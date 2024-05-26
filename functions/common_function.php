<?php

// include('./config/config.php'); 

function getproducts(){
global $con; 
if(!isset($_GET['category'])){
    if(!isset($_GET['brand'])){
$select_query = "SELECT * FROM `products` order by rand()";
$result_query = mysqli_query($con,$select_query);
while ($row = mysqli_fetch_assoc($result_query)) {
    $product_id = $row['product_id'];
    $product_title = $row['product_title'];
    $product_description = $row['product_discription'];
    $product_keywords = $row['product_keywords'];
    $product_categories = $row['category_id'];
    $product_brands = $row['brand_id'];
    $product_price = $row['product_price'];
    $product_image1 = $row['product_image1'];
echo "
    <div class='card'>
        <div class='ratio-box'>
            <img src='./admin/product_images/$product_image1' class='the-img' alt='$product_title'>
        </div>
        <div class='card-body'>
            <div class='card-info'>
                <span class='product-name'>$product_title</span>
                <span class='card-price'>$$product_price</span>
            </div>
            <div class='card-buttons'>
                <a  href='product_details.php?product_id=$product_id' class='btn see-more'>see more</a>
                <a  href='index.php?add_to_cart=$product_id' class='btn add-to-cart'>add to cart</a>
            </div>
        </div>
    </div>";
}
}
}
}
function  get_all_products(){   
global $con; 
if(!isset($_GET['category'])){
    if(!isset($_GET['brand'])){
$select_query = "SELECT * FROM `products` order by rand()";
$result_query = mysqli_query($con,$select_query);
while ($row = mysqli_fetch_assoc($result_query)) {
    $product_id = $row['product_id'];
    $product_title = $row['product_title'];
    $product_description = $row['product_discription'];
    $product_keywords = $row['product_keywords'];
    $product_categories = $row['category_id'];
    $product_brands = $row['brand_id'];
    $product_price = $row['product_price'];
    $product_image1 = $row['product_image1'];
echo "
    <div class='card'>
        <div class='ratio-box'>
            <img src='./admin/product_images/$product_image1' class='the-img' alt='$product_title'>
        </div>
        <div class='card-body'>
            <div class='card-info'>
                <span class='product-name'>$product_title</span>
                <span class='card-price'>$$product_price</span>
            </div>
            <div class='card-buttons'>
                <a  href='product_details.php?product_id=$product_id' class='btn see-more'>see more</a>
                <a  href='index.php?add_to_cart=$product_id' class='btn add-to-cart'>add to cart</a>
            </div>
        </div>
    </div>";
}
}
}
}
function get_filtered_product_category(){
    global $con;    
    if(isset($_GET['category'])){
    $category_id = $_GET['category'];
$select_query = "SELECT * FROM `products` where category_id = $category_id  order by rand()";
$result_query = mysqli_query($con,$select_query);
$number_of_rows = mysqli_num_rows($result_query);
if($number_of_rows == 0){
    echo "<h1>error</h1>";
    // adding no category animation
}
while ($row = mysqli_fetch_assoc($result_query)) {
    $product_id = $row['product_id'];
    $product_title = $row['product_title'];
    $product_description = $row['product_discription'];
    $product_keywords = $row['product_keywords'];
    $product_categories = $row['category_id'];
    $product_brands = $row['brand_id'];
    $product_price = $row['product_price'];
    $product_image1 = $row['product_image1'];
echo "
    <div class='card'>
        <div class='ratio-box'>
            <img src='./admin/product_images/$product_image1' class='the-img' alt='$product_title'>
        </div>
        <div class='card-body'>
            <div class='card-info'>
                <span class='product-name'>$product_title</span>
                <span class='card-price'>$$product_price</span>
            </div>
            <div class='card-buttons'>
                 <a  href='product_details.php?product_id=$product_id' class='btn see-more'>see more</a>
                 <a  href='index.php?add_to_cart=$product_id' class='btn add-to-cart'>add to cart</a>
            </div>
        </div>
    </div>";
}
}
}
function get_filtered_product_brand(){
    global $con;    
    if(isset($_GET['brand'])){
    $brand_id = $_GET['brand'];
$select_query = "SELECT * FROM `products` where category_id = $brand_id  order by rand()";
$result_query = mysqli_query($con,$select_query);
$number_of_rows = mysqli_num_rows($result_query);
if($number_of_rows == 0){
    echo "<h1>error</h1>";
    // adding no brands animation
}
while ($row = mysqli_fetch_assoc($result_query)) {
    $product_id = $row['product_id'];
    $product_title = $row['product_title'];
    $product_description = $row['product_discription'];
    $product_keywords = $row['product_keywords'];
    $product_categories = $row['category_id'];
    $product_brands = $row['brand_id'];
    $product_price = $row['product_price'];
    $product_image1 = $row['product_image1'];
echo "
    <div class='card'>
        <div class='ratio-box'>
            <img src='./admin/product_images/$product_image1' class='the-img' alt='$product_title'>
        </div>
        <div class='card-body'>
            <div class='card-info'>
                <span class='product-name'>$product_title</span>
                <span class='card-price'>$$product_price</span>
            </div>
        <div class='card-buttons'>
            <a  href='product_details.php?product_id=$product_id' class='btn see-more'>see more</a>
            <a  href='index.php?add_to_cart=$product_id' class='btn add-to-cart'>add to cart</a>
            </div>
        </div>
    </div>";
}
}
}
function get_category(){
    global $con;
         $select_categories = "SELECT * FROM `categories`";
                $result_categories = mysqli_query($con , $select_categories);              
                while(  $row_data = mysqli_fetch_assoc($result_categories)){
                    $category_title = $row_data["category_title"]; 
                    $category_id = $row_data["category_id"];
 echo "<li class='link'><a href='index.php?category=$category_id'> $category_title</a></li>";
                }
}

function get_brands(){
    global $con; 
      $select_brands = "SELECT * FROM `brands`";
                $result_brands = mysqli_query($con , $select_brands);            
                while(  $row_data = mysqli_fetch_assoc($result_brands)){
                    $brand_title = $row_data["brand_title"]; 
                    $brand_id = $row_data["brand_id"];
 echo "<li class='link'><a href='index.php?brand=$brand_id'> $brand_title</a></li>";
                }
                    }

function search_product(){
global $con; 
if(isset($_GET['search_data_product'])){
$search_data_value = $_GET['search_data'];
$search_query = "SELECT * FROM `products` where product_keywords like '%$search_data_value%'";
$result_query = mysqli_query($con,$search_query);
$number_of_rows = mysqli_num_rows($result_query);
if($number_of_rows == 0){
    echo "<h1>error</h1>";
    // adding no category animation
}
while ($row = mysqli_fetch_assoc($result_query)) {
    $product_id = $row['product_id'];
    $product_title = $row['product_title'];
    $product_description = $row['product_discription'];
    $product_keywords = $row['product_keywords'];
    $product_categories = $row['category_id'];
    $product_brands = $row['brand_id'];
    $product_price = $row['product_price'];
    $product_image1 = $row['product_image1'];
echo "
    <div class='card'>
        <div class='ratio-box'>
            <img src='./admin/product_images/$product_image1' class='the-img' alt='$product_title'>
        </div>
        <div class='card-body'>
            <div class='card-info'>
                <span class='product-name'>$product_title</span>
                <span class='card-price'>$$product_price</span>
            </div>
            <div class='card-buttons'>
                <a  href='product_details.php?product_id=$product_id' class='btn see-more'>see more</a>
                <a  href='index.php?add_to_cart=$product_id' class='btn add-to-cart'>add to cart</a>
            </div>
        </div>
    </div>";
}
}
}
function get_more_details(){
global $con; 
if(isset($_GET['product_id'])){
if(!isset($_GET['category'])){
    if(!isset($_GET['brand'])){
$product_id = $_GET['product_id'];
$select_query = "SELECT * FROM `products` where product_id=$product_id";
$result_query = mysqli_query($con,$select_query);
while ($row = mysqli_fetch_assoc($result_query)) {
    $product_id = $row['product_id'];
    $product_title = $row['product_title'];
    $product_description = $row['product_discription'];
    $product_keywords = $row['product_keywords'];
    $product_categories = $row['category_id'];
    $product_brands = $row['brand_id'];
    $product_price = $row['product_price'];
    $product_image1 = $row['product_image1'];
    $product_image2 = $row['product_image2'];
    $product_image3 = $row['product_image3'];
echo "
    <div class='card'>
        <div class='ratio-box'>
            <img src='./admin/product_images/$product_image1' class='the-img' alt='$product_title'>
        </div>
        <div class='card-body'>
            <div class='card-info'>
                <span class='product-name'>$product_title</span>
                <span class='card-price'>$$product_price</span>
            </div>
            <div class='card-buttons'>
             <a  href='product_details.php?product_id=$product_id' class='btn see-more'>see more</a>
             <a  href='index.php' class='btn add-to-cart'>home</a>
            </div>
        </div>
    </div>";
}
}
}
}
}
function getRealIPAddr()
{
 //check ip from share internet
  if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
  }
  //to check ip is pass from proxy
  elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
  } else {
    $ip = $_SERVER['REMOTE_ADDR'];
  }
  return $ip;
}
function cart() {
    if (isset($_GET['add_to_cart'])) {
        global $con;
        $get_ip_address = getRealIPAddr();
        $get_product_id = $_GET['add_to_cart'];
        $select_query = "SELECT * FROM `cart` WHERE ip_address='$get_ip_address' AND product_id=$get_product_id";
        $result_query = mysqli_query($con, $select_query);
        $number_of_rows = mysqli_num_rows($result_query);
        if ($number_of_rows > 0) {
            echo "<script>alert('Product already in the cart')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        } else {
            $insert_query = "INSERT INTO `cart` (product_id, ip_address, quantity) VALUES ($get_product_id, '$get_ip_address', 1)";
            $result_query = mysqli_query($con, $insert_query);
            echo "<script>alert('item is added to cart')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        }
    }
}
function cart_item(){
    if (isset($_GET['add_to_cart'])) {
        global $con;
        $get_ip_address = getRealIPAddr();
        $select_query = "SELECT * FROM `cart` WHERE ip_address='$get_ip_address'";
        $result_query = mysqli_query($con, $select_query);
        $number_cart_items = mysqli_num_rows($result_query);}
     else  
     {
        global $con;
        $get_ip_address = getRealIPAddr();
        $select_query = "SELECT * FROM `cart` WHERE ip_address='$get_ip_address'";
        $result_query = mysqli_query($con, $select_query);
        $number_cart_items = mysqli_num_rows($result_query);
    }
    echo  $number_cart_items;
        }
function total_cart_price(){
    global $con;
    $get_ip_address = getRealIPAddr();
    $total_price = 0;
    $cart_query = "select * from `cart` where ip_address='$get_ip_address'";
    $result = mysqli_query($con,$cart_query);
    while ($row=mysqli_fetch_array($result)) {
        $product_id = $row['product_id'];
        $select_products = "select * from `products` where product_id='$product_id'";
        $result_product = mysqli_query($con,$select_products);
        while ($row_product_price = mysqli_fetch_array($result_product)) {
        $row_product_price = array($row_product_price['product_price']);
        $product_values= array_sum($row_product_price);
        $total_price+=$product_values;
        }
    }
    echo$total_price;
}

function get_user_order_detail() {
    global $con;
if(isset($_SESSION['username'])){

    $username = $_SESSION['username'];
    $get_details = "SELECT * FROM `user` WHERE username = '$username'";
    $result_query = mysqli_query($con, $get_details);
    while ($row_query = mysqli_fetch_array($result_query)) {
        $user_id = $row_query['user_id'];
        
        if (!isset($_GET['edit_account']) && !isset($_GET['my_orders']) && !isset($_GET['delete_account'])) {
            $get_orders = "SELECT * FROM `user_order` WHERE user_id = $user_id AND order_status = 'pending'";
            $result_orders_query = mysqli_query($con, $get_orders);
            $row_count = mysqli_num_rows($result_orders_query);
            if ($row_count > 0) {
                echo "You have <b class='pending'>$row_count</b> pending orders.";
                echo "<a href='profile.php?my_orders'>order detail</a>";
            }
            else{
                echo "You have no pending orders.";
                echo "<a href='../index.php'>explore products</a>";
            }
        }
    }
}
}


?>