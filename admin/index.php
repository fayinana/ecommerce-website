<?php 
include('../config/config.php');
include('../functions/common_function.php');
session_start();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
    <link rel="stylesheet" href="../css/style.css?v=<?php echo filemtime('../css/style.css'); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="../css/new_style.css?v=<?php echo filemtime('../css/new_style.css'); ?>">
</head>

<body>

    <!-- start of nav bar -->
    <nav>

        <section class="top-nav">

            <article class="logo">
                <img src="../logo.jpg" alt="">
            </article>

            <article class="nav-icon">
                <span class="top-icons" class="profile-toggle" id="profile-toggle">
                    <i class='fas fa-user'></i>

                </span>

                <div class="mini-profile">
                    <ul>

                        <li><img src='../logo.jpg' alt='$user_image'></li>
                        <?php
        
        if (!isset($_SESSION['admin_name'])) {
            echo " <li>
                            <p>welcome admin</p>
                        </li>";


            echo "<li><a href='./admin_login.php'><i class='fas fa-sign-in-alt'></i>login</a></li>";
        }
        else {
            echo "<li>".$_SESSION['admin_name']."</li>";
            echo "<li><a href='../users/logout.php'><i class='fas fa-sign-out-alt'></i>logout</a></li>";
            echo "<script>window.open(./admin_login.php)</script>";
            
        }
        ?>
                    </ul>

                </div>

            </article>
        </section>
    </nav>
    <!-- ERROR DISPLAY -->
    <main class="main-section2">


        <aside class="main-menu2">
            <ul class="lists">
                <li class="list"><a href="insert_product.php">insert products</a></li>
                <li class="list"><a href="index.php?view_products">view products</a></li>
                <li class="list"><a href="index.php?insert-category">insert category</a></li>
                <li class="list"><a href="index.php?view_category">view category</a></li>
                <li class="list"><a href="index.php?insert-brands">insert brands</a></li>
                <li class="list"><a href="index.php?view_brands">view brands</a></li>
                <li class="list"><a href="index.php?all_orders">all orders</a></li>
                <li class="list"><a href="index.php?all_payments">all payments</a></li>
                <li class="list"><a href="index.php?list_users">user list</a></li>
                <li class="list"><a href="">log out</a></li>
            </ul>
        </aside>

        <section class="contents">
            <?php 
            
            if(isset($_GET['insert-category'])){

                include('insert-category.php');
            }
            if(isset($_GET['insert-brands'])){

                include('insert-brands.php');
            }
            if(isset($_GET['view_products'])){

                include('view_products.php');
            }
            if(isset($_GET['edit_products'])){

                include('edit_products.php');
            }
            if(isset($_GET['delete_product'])){

                include('delete_product.php');
            }
            if(isset($_GET['view_category'])){

                include('view_category.php');
            }
            if(isset($_GET['view_brands'])){

                include('view_brands.php');
            }
            if(isset($_GET['edit_category'])){

                include('edit_category.php');
            }
            if(isset($_GET['edit_brand'])){

                include('edit_brand.php');
            }
            if(isset($_GET['delete_brand'])){

                include('delete_brand.php');
            }
            if(isset($_GET['all_orders'])){

                include('all_orders.php');
            }
            if(isset($_GET['delete_category'])){

            include('delete_category.php');
            }
            if(isset($_GET['all_payments'])){

            include('all_payments.php');
            }
            if(isset($_GET['list_users'])){

            include('list_users.php');
            }
            ?>
        </section>
    </main>

    <script src="../js/script.js"></script>
</body>

</html>