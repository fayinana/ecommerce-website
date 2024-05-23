<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <form action="" class="form" method="post" enctype="multipart/form-data">

        <div class="single-form">
            <label for="name">username</label>
            <input type="text" name="user_username" id="name" placeholder="enter user name" autocomplete="off"
                required="required">
        </div>

        <div class="single-form">
            <label for="password">password</label>
            <input type="password" name="user_password" id="password" placeholder="enter password" autocomplete="off"
                required="required">
        </div>


        <input type="submit" value="login" class="btn" name="user_login">
        <p>don't have an account <a href="../users/registration.php">register</a></p>

    </form>
</body>

</html>