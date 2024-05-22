<?php


include('./config/config.php'); 


function getproducts(){

global $con; 

if(!isset($_GET['category'])){

    if(!isset($_GET['brand'])){


$select_query = "SELECT * FROM `products` order by rand()";
$result_query = mysqli_query($con,$select_query);
// $row = mysqli_fetch_assoc($result_query);
// echo $row['product_title'];

while ($row = mysqli_fetch_assoc($result_query)) {
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
                <span class='add-to-fev'>O</span>
                <span class='btn add-to-cart'>add to cart</span>
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
// $row = mysqli_fetch_assoc($result_query);
// echo $row['product_title'];

while ($row = mysqli_fetch_assoc($result_query)) {
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
                <span class='add-to-fev'>O</span>
                <span class='btn add-to-cart'>add to cart</span>
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
// $row = mysqli_fetch_assoc($result_query);
// echo $row['product_title'];

while ($row = mysqli_fetch_assoc($result_query)) {
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
                <span class='add-to-fev'>O</span>
                <span class='btn add-to-cart'>add to cart</span>
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
                <span class='add-to-fev'>O</span>
                <span class='btn add-to-cart'>add to cart</span>
            </div>
        </div>
    </div>";
}

}
}




?>