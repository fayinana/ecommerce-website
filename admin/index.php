<?php 
include('../functions/common_function.php');
include('../config/config.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>

<body>
    <nav class="admin-nav-bar">
        <ul class="lists">
            <a href="./" class="logo">
                logo
            </a>
            <a href="./" class="admin-profile">
                <div class="admin-profile-card">
                    <img src="../images/customer-img.jpg" alt="">
                </div>
                <p>hi admin</p>

            </a>
        </ul>
    </nav>
    <main class="admin-dashboard">


        <aside class="admin-side-bar">
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

        <section class="display-information">
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