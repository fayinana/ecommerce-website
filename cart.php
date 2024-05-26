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



    <div class="cart-container">
        <form action="" method="post">
            <table class="table">
                <?php 
                    global $con;
                    $get_ip_address = getRealIPAddr();
                    $total_price = 0;
                    $cart_query = "SELECT * FROM `cart` WHERE ip_address='$get_ip_address'";
                    $result = mysqli_query($con,$cart_query);
                    $result_count = mysqli_num_rows($result);
                    if($result_count > 0){
                        echo "
                        <thead>
                            <tr>
                                <th>product title</th>
                                <th>product image</th>
                                <th>quantity</th>
                                <th>total price</th>
                                <th>remove</th>
                                <th>operations</th>
                            </tr>
                        </thead>
                        <tbody>";
                        while ($row=mysqli_fetch_array($result)) {
                            $product_id = $row['product_id'];
                            $select_products = "SELECT * FROM `products` WHERE product_id='$product_id'";
                            $result_product = mysqli_query($con,$select_products);
                            while ($row_product_price = mysqli_fetch_array($result_product)) {
                                $product_price = array($row_product_price['product_price']);
                                $price_table = $row_product_price['product_price'];
                                $product_title = $row_product_price['product_title'];
                                $product_image1 = $row_product_price['product_image1'];
                                $product_values= array_sum($product_price);
                                $total_price+=$product_values;
                ?>
                <tr>
                    <td><?php echo $product_title?></td>
                    <td><img src="admin/product_images/<?php echo $product_image1?>" alt=""></td>

                    <td><input type="text" name="quantity"></td>
                    <?php 
                     $get_ip_address = getRealIPAddr();
                    if(isset($_POST['update_cart'])){
                $quantities = $_POST['quantity'];
                $update_cart = "UPDATE `cart` SET quantity='$quantities' WHERE product_id=$product_id AND ip_address='$get_ip_address'";
                $result_quantity = mysqli_query($con, $update_cart);
                $total_price=$total_price * $quantities;
            }
                    
                    ?>

                    <td><?php echo $price_table?></td>
                    <td><input type="checkbox" name="remove_item[]" value="<?php echo $product_id?>"></td>
                    <td>
                        <input type="submit" value="update" class="btn" name="update_cart">
                        <input type="submit" value="remove" class="btn" name="remove_cart">
                    </td>
                </tr>
                <?php 
                            }
                        }
                        echo "</tbody>";
                    }
                    else {
                        echo "<h2>no cart</h2>";
                    }
                ?>

            </table>

            <?php 
                    global $con;
                    $get_ip_address = getRealIPAddr();
                    $cart_query = "SELECT * FROM `cart` WHERE ip_address='$get_ip_address'";
                    $result = mysqli_query($con,$cart_query);
                    $result_count = mysqli_num_rows($result);
                    if($result_count > 0){
            echo "
            <div class='out-put'>
                <p>total : <span>$total_price</span> </p>
            <a href='index.php' class='btn'>continue shopping</a>

            <a href='./users/checkout.php' class='btn'>check out</a>
    </div>

    ";}
    else {
    echo "

    <a href='index.php' class='btn'>continue shopping</a>
    ";


    }
    ?>
        </form>
    </div>
    <?php  
        function remove_cart(){
            global $con;
            if(isset($_POST['remove_cart'])){
                foreach($_POST['remove_item'] as $remove_id){
                    $delete_query = "DELETE FROM `cart` WHERE product_id=$remove_id" ;
                    $run_delete = mysqli_query($con,$delete_query);
                    if($run_delete){
                        echo "<script>window.open('index.php','_self')</script>";
                    }
                }
            }
        }
        remove_cart();

       
    ?>

    <script src="./js/script.js?v=<?php echo filemtime('./js/script.js'); ?>"></script>

</body>

</html>