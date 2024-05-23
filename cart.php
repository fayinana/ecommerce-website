<?php 
include('./config/config.php');
include('./functions/common_function.php');

cart();
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
                <li class="list"><a href="cart.php">
                        <span class="icon"></span><sup>
                            <?php 
                            cart_item();
                            ?>
                        </sup>
                    </a></li>
            </ul>
        </div>

        <form action="search_product.php" method="get" class="search-form">
            <input type="search" class="search" placeholder="Search a product..." name="search_data">
            <input type="submit" value="search" class="btn" name="search_data_product">
        </form>
    </nav>

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

            <a href='checkout.php' class='btn'>check out</a>
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

    <script src="./js/script.js"></script>
</body>

</html>