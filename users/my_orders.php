<?php 
    $username = $_SESSION['username'];
    $get_user = "select * from `user` where username = '$username'";

$result = mysqli_query($con,$get_user);
$row_fetch=mysqli_fetch_array($result);
$user_id = $row_fetch['user_id'];
?>


<table class="table">
    <thead>

        <tr>

            <th>si no</th>
            <th>amount due</th>
            <th>total products</th>
            <th>invoice number</th>
            <th>date</th>
            <th>complete/incomplete</th>
            <th>status</th>
        </tr>
    </thead>

    <tbody>

        <?php 
    
    $get_order_details = "select * from `user_order` where user_id=$user_id";
$result_order_details = mysqli_query($con,$get_order_details);
while ($row_orders=mysqli_fetch_assoc($result_order_details)) {
    $order_id = $row_orders['order_id'];
    $amount_due = $row_orders['amount_due'];
    $total_product = $row_orders['total_product'];
    $invoice_number = $row_orders['invoice_number'];
    $order_date = $row_orders['order_date'];
    $order_status = $row_orders['order_status'];
    if($order_status == 'pending'){
        $order_status = 'incomplete';
    }
    else{
        $order_status = 'complete';
    }
echo "

<tr>
   <tr>
    <td>$order_id</td>
    <td>$amount_due</td>
    <td>$total_product</td>
    <td>$invoice_number</td>
    <td>$order_date</td>
    <td>$order_status</td>
    <td><a href='confirm_payment.php'>confirm</a></td>
</tr>
</tr>
";

}
    
?>

    </tbody>
</table>