<?php 
include('./config/config.php');
include('./functions/common_function.php');

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/6.4.0/css/font-awesome.min.css">
</head>

<body>
    <!--  nav bar -->

    <nav>
        <button class="navigation-btn btn">
            <i class="fas fa bars"></i>
        </button>
        <div class="nav-bar">
            <div class="nav-bar-header">
                <!-- <img src="logo.svg" class="logo" alt="" /> -->
                <p class="logo"></p>
                <button class="close-btn"><i class="fas fa-times">X</i></button>
            </div>
            <ul class="lists">
                <li class="list"><a href="index.php">
                        <span class="icon"></span>home
                    </a></li>
                <li class="list"><a href="display_all.php">
                        <span class="icon"></span>products
                    </a></li>
                <li class="list"><a href="">
                        <span class="icon"></span>
                        register</a></li>
                <li class="list"><a href="">
                        <span class="icon"></span>contact
                    </a></li>
                <li class="list"><a href="">
                        <span class="icon"><i class="fas fa-shopping-cart"></i></span><sup>
                            <?php 
                            cart_item();
                            ?>
                        </sup>
                    </a></li>
                <li class="list"><a href="">
                        total price:100/-
                    </a></li>
            </ul>
        </div>

        <form action="search_product.php" method="get" class="search-form">
            <input type="search" class="search" placeholder="Search a product..." name="search_data">


            <input type="submit" value="search" class="btn" name="search_data_product">
        </form>
    </nav>
    <!-- USER DATA -->


    <?php 

cart()
?>

    <!-- ERROR DISPLAY -->

    <main class="main-section">
        <!-- products -->
        <section class="products">

            <?php 
            // getproducts();
            get_more_details();
            get_filtered_product_category();
            get_filtered_product_brand()


?>

        </section>
        <!--end products -->

        <!-- side bar -->
        <section class="side-bar">

            <div class="profile">

                </ul>
            </div>

            <div class="category">
                <h2 class="title">category</h2>
                <ul class="category-list">

                    <?php 
                get_category()

            
                ?>

                </ul>
            </div>
            <div class="factory">
                <h2 class="title">brand</h2>
                <ul class="category-list">

                    <?php 
                    get_brands()

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