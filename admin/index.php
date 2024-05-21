<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin</title>
    <link rel="stylesheet" href="../css/style.css">
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
                <li class="list"><a href="">view products</a></li>
                <li class="list"><a href="index.php?insert-category">insert category</a></li>
                <li class="list"><a href="">view category</a></li>
                <li class="list"><a href="index.php?insert-brands">insert brands</a></li>
                <li class="list"><a href="">view brands</a></li>
                <li class="list"><a href="">all orders</a></li>
                <li class="list"><a href="">all payments</a></li>
                <li class="list"><a href="">user list</a></li>
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
            ?>
        </section>
    </main>

    <script src="../js/script.js"></script>
</body>

</html>