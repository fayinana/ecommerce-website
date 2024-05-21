<?php 
include('./config/config.php')

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <!--  nav bar -->

    <nav>
        <button class="navigation-btn btn">
            <i class="fas fa bars">==</i>
        </button>
        <div class="nav-bar">
            <div class="nav-bar-header">
                <!-- <img src="logo.svg" class="logo" alt="" /> -->
                <p class="logo">logo</p>
                <button class="close-btn"><i class="fas fa-times">X</i></button>
            </div>
            <ul class="lists">
                <li class="list"><a href="/home">
                        <span class="icon"></span>home
                    </a></li>
                <li class="list"><a href="">
                        <span class="icon"></span>products
                    </a></li>
                <li class="list"><a href="">
                        <span class="icon"></span>
                        register</a></li>
                <li class="list"><a href="">
                        <span class="icon"></span>contact
                    </a></li>
                <li class="list"><a href="">
                        <span class="icon"></span>cart
                    </a></li>
                <li class="list"><a href="">
                        total price:100/-
                    </a></li>
            </ul>
        </div>

        <form action="" class="search-form">
            <input type="text" class="search" placeholder="Search a product...">
            <button type="submit" class="btn search-btn"><span class="icon">0</span>
                <span class="text">search</span>
            </button>
        </form>
    </nav>
    <!-- USER DATA -->



    <!-- ERROR DISPLAY -->

    <main class="main-section">
        <!-- products -->
        <section class="products">

            <?php 
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

?>


            <!-- single product -->
            <div class="card">
                <div class="ratio-box">
                    <img src="./images/customer-img.jpg" class="the-img" alt="">
                </div>
                <div class="card-body">
                    <div class="card-info">
                        <span class="product-name ">coffee</span>
                        <span class="card-price">$34</span>
                    </div>
                    <div class="card-buttons">
                        <span class="add-to-fev">O</span>
                        <span class="btn add-to-cart">add to cart</span>
                    </div>
                </div>
            </div>
            <!-- end fo single product -->
            <!-- single product -->
            <div class="card">
                <div class="ratio-box">
                    <img src="./images/customer-img.jpg" class="the-img" alt="">
                </div>
                <div class="card-body">
                    <div class="card-info">
                        <span class="product-name ">coffee</span>
                        <span class="card-price">$34</span>
                    </div>
                    <div class="card-buttons">
                        <span class="add-to-fev">O</span>
                        <span class="btn add-to-cart">add to cart</span>
                    </div>
                </div>
            </div>
            <!-- end fo single product -->
            <!-- single product -->
            <div class="card">
                <div class="ratio-box">
                    <img src="./images/customer-img.jpg" class="the-img" alt="">
                </div>
                <div class="card-body">
                    <div class="card-info">
                        <span class="product-name ">coffee</span>
                        <span class="card-price">$34</span>
                    </div>
                    <div class="card-buttons">
                        <span class="add-to-fev">O</span>
                        <span class="btn add-to-cart">add to cart</span>
                    </div>
                </div>
            </div>
            <!-- end fo single product -->
            <!-- single product -->
            <div class="card">
                <div class="ratio-box">
                    <img src="./images/customer-img.jpg" class="the-img" alt="">
                </div>
                <div class="card-body">
                    <div class="card-info">
                        <span class="product-name ">coffee</span>
                        <span class="card-price">$34</span>
                    </div>
                    <div class="card-buttons">
                        <span class="add-to-fev">O</span>
                        <span class="btn add-to-cart">add to cart</span>
                    </div>
                </div>
            </div>
            <!-- end fo single product -->
            <!-- single product -->
            <div class="card">
                <div class="ratio-box">
                    <img src="./images/customer-img.jpg" class="the-img" alt="">
                </div>
                <div class="card-body">
                    <div class="card-info">
                        <span class="product-name ">coffee</span>
                        <span class="card-price">$34</span>
                    </div>
                    <div class="card-buttons">
                        <span class="add-to-fev">O</span>
                        <span class="btn add-to-cart">add to cart</span>
                    </div>
                </div>
            </div>
            <!-- end fo single product -->
        </section>
        <!--end products -->

        <!-- side bar -->
        <section class="side-bar">

            <div class="profile">
                <!-- <ul>
                    <li class="list"><a href="">
                            <div class="profile-card">
                                <img class="the-img" src="./images/customer-img.jpg" alt="">
                            </div>
                            <p>hello gust</p>
                        </a></li>
                    <li class="list"><a href="">
                            <span class="icon"></span>login/signup
                        </a></li>

                </ul> -->
            </div>

            <div class="category">
                <h2 class="btn">category</h2>
                <ul class="category-list">

                    <?php 
                $select_categories = "SELECT * FROM `categories`";
                $result_categories = mysqli_query($con , $select_categories); 
              
                while(  $row_data = mysqli_fetch_assoc($result_categories)){
                    $category_title = $row_data["category_title"]; 
                    $category_id = $row_data["category_id"];
 echo "<li class='link'><a href='index.php?category=$category_id'> $category_title</a></li>";
                   
                }
            
                ?>

                </ul>
            </div>
            <div class="factory">
                <h2 class="btn">brand</h2>
                <ul class="category-list">

                    <?php 
                $select_brands = "SELECT * FROM `brands`";
                $result_brands = mysqli_query($con , $select_brands); 
           
                while(  $row_data = mysqli_fetch_assoc($result_brands)){
                    $brand_title = $row_data["brand_title"]; 
                    $brand_id = $row_data["brand_id"];
 echo "<li class='link'><a href='index.php?brand=$brand_id '> $brand_title</a></li>";
                   
                }
                ?>
                </ul>
            </div>

        </section>
        <!-- end of side bar -->

    </main>
    <!-- footer -->
    <!-- <footer>
        <p></p>
    </footer> -->


    <script src="./js/script.js"></script>
</body>

</html>