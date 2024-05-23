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
            <i class="fas fa bars">==</i>
        </button>
        <div class="nav-bar">
            <div class="nav-bar-header">
                <!-- <img src="logo.svg" class="logo" alt="" /> -->
                <p class="logo">logo</p>
                <button class="close-btn"><i class="fas fa-times">X</i></button>
            </div>
            <ul class="lists">
                <li class="list"><a href="index.php">
                        <span class="icon"></span>home
                    </a></li>
                <li class="list"><a href="display_all.php">
                        <span class="icon"></span>products
                    </a></li>
                <li class="list"><a href="cart.php">
                        <span class="icon"></span>
                        register</a></li>
                <li class="list"><a href="">
                        <span class="icon"></span>contact
                    </a></li>
            </ul>
        </div>

        <form action="search_product.php" method="get" class="search-form">
            <input type="search" class="search" placeholder="Search a product..." name="search_data">


            <input type="submit" value="search" class="btn" name="search_data_product">
        </form>
    </nav>
    <!-- USER DATA -->



    <!-- ERROR DISPLAY -->

    <main class="main-section">
        <?php 
if(!isset($_SESSION['username'])){
    include('./users/user_login.php');
}
else{
    include('payment.php');
}
?>
    </main>
    <!-- footer -->
    <!-- <footer>
        <p></p>
    </footer> -->


    <script src="./js/script.js"></script>
</body>

</html>