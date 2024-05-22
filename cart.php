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
    <!-- USER DATA -->

    <?php 

cart()
?>

    <div class="cart-container">
        <table class="table">
            <thead>
                <tr>
                    <th>product title</th>
                    <th>product image</th>
                    <th>remove</th>
                    <th>total price</th>
                    <th>quantity</th>
                    <th>operations</th>
                </tr>
            </thead>
            <tbody>

                <?php 
            
            global $con;
    $get_ip_address = getRealIPAddr();
    $total_price = 0;
    $cart_query = "select * from `cart` where ip_address='$get_ip_address'";
    $result = mysqli_query($con,$cart_query);
    
    while ($row=mysqli_fetch_array($result)) {
        $product_id = $row['product_id'];
        $select_products = "select * from `products` where product_id='$product_id'";
        $result_product = mysqli_query($con,$select_products);
        while ($row_product_price = mysqli_fetch_array($result_product)) {
            $product_price = array($row_product_price['product_price']);
            $price_table = $row_product_price['product_price'];
            $product_title = $row_product_price['product_title'];
            $product_image1 = $row_product_price['product_image1'];
            $product_values= array_sum($row_product_price);
            $total_price+=$product_values;


    
            
            
            ?>
                <tr>
                    <td>apple</td>
                    <td><img src="./images/<?php echo $product_image1?>" alt=""></td>
                    <td><input type="checkbox"></td>
                    <td><?php echo $price_table?></td>
                    <td><input type="check"></td>
                    <td>
                        <p>update</p>
                        <p>remove</p>
                    </td>
                </tr>
                <?php 
                
                    }


    }?>
            </tbody>
        </table>
    </div>
    <!-- footer -->
    <!-- <footer>
        <p></p>
    </footer> -->


    <script src="./js/script.js"></script>
</body>

</html>