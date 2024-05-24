<?php 
include('../config/config.php');
session_start();
if (isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];

    $select_data = "select * from `user_order` where order_id=$order_id";
    $result = mysqli_query($con,$select_data);
    $row_fetch = mysqli_fetch_assoc($result);
    $invoice_number = $row_fetch['invoice_number'];
       $amount_due = $row_fetch['amount_due'];
}

if(isset($_POST['confirm'])){

    $invoice_number = $_POST['invoice_number'];
    $amount = $_POST['amount'];
    $payment_mode = $_POST['payment_mode'];
    
    
    $insert_query = "INSERT INTO user_payment (order_id, invoice_number, amount, payment_mode)
                 VALUES ($order_id, $invoice_number, $amount, '$payment_mode')";

$result = mysqli_query($con,$insert_query);
if($result){
    echo "<h1>success</h1>";
    echo "<script>window.open('profile.php?my_orders','_self')</script>";
}

$update_orders = "update `user_order` set order_status='complete' where order_id = $order_id ";
$result_order = mysqli_query($con,$update_orders);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>payment</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <form action="" method="post" class="form">
        <div class="single-form">
            <label for="invoice_number">invoice number</label>
            <input type="text" name="invoice_number" value="<?php echo $invoice_number?>">
        </div>
        <div class="single-form">
            <label for="amount">amount</label>
            <input type="text" name="amount" value="<?php echo $amount_due?>">
        </div>
        <div class="single-form">
            <label for="">invoice number</label>
            <select name="payment_mode" id="">
                <option value="">select payment mode</option>
                <option value="">tele birr</option>
                <option value="">cbe birr</option>
            </select>
        </div>

        <input type="submit" value="confirm" class="btn" name="confirm">

    </form>
</body>

</html>