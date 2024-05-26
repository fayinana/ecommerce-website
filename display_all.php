<?php 
include('./config/config.php');
include('./functions/common_function.php');
session_start();
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="./css/new_style.css?v=<?php echo filemtime('./css/new_style.css'); ?>">
</head>

<body>

    <!-- start of nav bar -->
    <nav>

        <section class="top-nav">

            <article class="logo">
                <img src="./logo.jpg" alt="">
            </article>

            <form action="search_product.php" method="get" class="search-form">
                <input type="search" class="search" placeholder="Search a product..." name="search_data">
                <input type="submit" value="Search" name="search_data_product">
            </form>
            <article class="nav-icon">
                <span class="top-icons" class="profile-toggle" id="profile-toggle">
                    <i class='fas fa-user'></i>

                </span>

                <div class="mini-profile">
                    <ul>
                        <li><img src="./images/customer-img.jpg" alt=""></li>

                        <?php 
        
        if (!isset($_SESSION['username'])) {
            echo " <li>
                            <p>welcome gust</p>
                        </li>";


            echo "<li><a href='./users/user_login.php'><i class='fas fa-sign-in-alt'></i>login</a></li>";
        }
        else {
            echo "<li>".$_SESSION['username']."</li>";
            echo "<li><a href='./users/logout.php'><i class='fas fa-sign-out-alt'></i>logout</a></li>";
            
        }
        ?>
                    </ul>

                </div>
                <span class="top-icons">
                    <a href="cart.php">
                        <i class="fas fa-shopping-bag"></i>
                        <span class="top-text">
                            <?php 
                            cart_item();
                            ?>
                        </span>
                    </a>
                </span>
                <span class="price-top">
                    <?php 
                         total_cart_price()
                        ?>
                </span>
            </article>
        </section>
        <section class="bottom-nav">

            <ul class="nav-lists">
                <li class="nav-list active">
                    <a href="index.php">
                        <span class="icon"><i class="fa fa-home"></i> </span>home
                    </a>
                </li>
                <li class="nav-list">
                    <a href="display_all.php">
                        <span class="icon"><i class="fas fa-shopping-bag"></i> </span>products
                    </a>
                </li>
                <?php 
                     if (!isset($_SESSION['username'])) {
          echo "<li class='nav-list'><a href='users/registration.php'>
                        <span class='icon'><i fas fa-user-plus></i> </span>
                        register</a></li>";
        }
        else {
             echo "<li class='nav-list'><a href='users/profile.php'>
                       <span class='icon'><i class='fas fa-user'></i> </span>my account 
                        </a></li>";
        }
                    ?>
                <li class="nav-list"><a href="">
                        <span class="icon"><i class="fas fa-envelope"></i> </span>contact
                    </a></li>

            </ul>
        </section>
    </nav>
    <?php                             
    cart()                     
?>

    <!-- ERROR DISPLAY -->

    <main class="main-section">
        <!-- products -->
        <section class="products">

            <?php 
            get_all_products();
            get_filtered_product_category();
            get_filtered_product_brand();
// $select_query = "SELECT * FROM `products` order by rand()";
// $result_query = mysqli_query($con,$select_query);
// // $row = mysqli_fetch_assoc($result_query);
// // echo $row['product_title'];

// while ($row = mysqli_fetch_assoc($result_query)) {
//   $product_title = $row['product_title'];
//  $product_description = $row['product_discription'];
//  $product_keywords = $row['product_keywords'];
//  $product_categories = $row['category_id'];
//  $product_brands = $row['brand_id'];
//  $product_price = $row['product_price'];
//  $product_image1 = $row['product_image1'];


// echo "
//     <div class='card'>
//         <div class='ratio-box'>
//             <img src='./admin/product_images/$product_image1' class='the-img' alt='$product_title'>
//         </div>
//         <div class='card-body'>
//             <div class='card-info'>
//                 <span class='product-name'>$product_title</span>
//                 <span class='card-price'>$$product_price</span>
//             </div>
//             <div class='card-buttons'>
//                 <span class='add-to-fev'>O</span>
//                 <span class='btn add-to-cart'>add to cart</span>
//             </div>
//         </div>
//     </div>";
// }

?>

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
                <h2 class="title">category</h2>
                <ul class="category-list">

                    <?php 
                get_category()

//                 $select_categories = "SELECT * FROM `categories`";
//                 $result_categories = mysqli_query($con , $select_categories); 
              
//                 while(  $row_data = mysqli_fetch_assoc($result_categories)){
//                     $category_title = $row_data["category_title"]; 
//                     $category_id = $row_data["category_id"];
//  echo "<li class='link'><a href='index.php?category=$category_id'> $category_title</a></li>";
                   
//                 }
            
                ?>

                </ul>
            </div>
            <div class="factory">
                <h2 class="title">brand</h2>
                <ul class="category-list">

                    <?php 
                    get_brands()
//                 $select_brands = "SELECT * FROM `brands`";
//                 $result_brands = mysqli_query($con , $select_brands); 
           
//                 while(  $row_data = mysqli_fetch_assoc($result_brands)){
//                     $brand_title = $row_data["brand_title"]; 
//                     $brand_id = $row_data["brand_id"];
//  echo "<li class='link'><a href='index.php?brand=$brand_id '> $brand_title</a></li>";
                   
//                 }
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


    <script src="./js/script.js?v=<?php echo filemtime('./js/script.js'); ?>"></script>

</body>

</html>