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
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/6.4.0/css/font-awesome.min.css">
</head>

<body>
    <!--  nav bar -->

    <nav>
        <button class="navigation-btn btn">
            <i class="fas fa bars">==</i>
        </button>
        <div class="nav-bar">
            <div class="nav-bar-header">
                <p class="logo">logo</p>
                <button class="close-btn"><i class="fas fa-times">X</i></button>
            </div>
            <ul class="lists">
                <li class="list"><a href="../index.php">
                        <span class="icon"></span>home
                    </a></li>
                <li class="list"><a href="../display_all.php">
                        <span class="icon"></span>products
                    </a></li>
                <li class="list"><a href="registration.php">
                        <span class="icon"></span>
                        register</a></li>
                <li class="list"><a href="">
                        <span class="icon"></span>contact
                    </a></li>
                <li class="list"><a href="../cart.php">
                        <span class="icon"></span><sup>
                            <?php 
                            cart_item();
                            ?>
                        </sup>
                    </a></li>
                <li class="list"><a href="">
                        total price: <?php 
                         total_cart_price()
                        ?>
                    </a></li>
            </ul>
        </div>

        <form action="search_product.php" method="get" class="search-form">
            <input type="search" class="search" placeholder="Search a product..." name="search_data">


            <input type="submit" value="search" class="btn" name="search_data_product">
        </form>
    </nav>

    <?php 

cart()
?>
    <!-- USER DATA -->

    <div class="log">
        <?php 
        
        if (!isset($_SESSION['username'])) {
            echo "<span>welcome gust</span><span><a href='./users/user_login.php'>login</a></span>";
        }
        else {
            echo "<span>welcome".$_SESSION['username']."</span><span><a href='./logout.php'>logout</a></span>";

        }
        ?>
    </div>

    <!-- ERROR DISPLAY -->

    <main class="main-section">
        <!-- products -->

        <!--end products -->

        <!-- side bar -->
        <section class="side-bar">

            <div class="profile">
            </div>


            <div class="category">
                <h2 class="title">your profile</h2>
                <ul class="category-list">
                    <?php 
              $username = $_SESSION['username'];
              $user_image = "select * from `user` where username='$username'";
              $result_image = mysqli_query($con,$user_image);
              $row_image = mysqli_fetch_array($result_image);
              $user_image = $row_image['user_image'];
              echo "<li class='list'><img src='./users_image/$user_image' alt='$user_image' width='100px' height='100px'> </li>"
                        ?>

                    <li class="link"><a href="profile.php">pending orders</a></li>
                    <li class="link"><a href="profile.php?edit_account">edit account</a></li>
                    <li class="link"><a href="profile.php?my_orders">my orders</a></li>
                    <li class="link"><a href="profile.php?delete_account">delete account</a></li>
                    <li class="link"><a href="logout.php">logout</a></li>

                </ul>
            </div>


        </section>
        <!-- end of side bar -->
        <section class="">
            <?php 

get_user_order_detail();
if (isset($_GET['edit_account'])) {
include('edit_account.php');
}
if (isset($_GET['my_orders'])) {
include('my_orders.php');
}
?>
        </section>

    </main>


    <script src="./js/script.js"></script>
</body>

</html>