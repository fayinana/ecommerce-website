 <h2 class="recent-order">view brands</h2>

 <table>
     <thead>
         <tr>
             <th>s no</th>
             <th>brands</th>
             <th>edit</th>
             <th>delete</th>
         </tr>
     </thead>
     <tbody>
         <?php 
$select_query = "SELECT * FROM `brands`";
$result = mysqli_query($con,$select_query);
$number = 1;
while ($row = mysqli_fetch_assoc($result)) {
    $brand_title = $row['brand_title'];
    $brand_id = $row['brand_id'];
    ?>
         <tr>
             <td><?php echo $number?></td>
             <td><?php echo $brand_title?></td>
             <td class="ditale"><a href='index.php?edit_brand=<?php echo $brand_id?> '>edit</a></td>
             <td class="discarded"><a href='index.php?delete_brand=<?php echo $brand_id ?>'>delete</a></td>

         </tr>
         <?php
        $number++;
        }
        ?>

     </tbody>
 </table>