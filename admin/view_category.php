<h1>view category</h1>
<table>
    <thead>
        <tr>
            <th>s no</th>
            <th>category</th>
            <th>edit</th>
            <th>delete</th>
        </tr>
    </thead>
    <tbody>
        <?php 
$select_query = "SELECT * FROM `categories`";
$result = mysqli_query($con,$select_query);
$number = 1;
while ($row = mysqli_fetch_assoc($result)) {
    $category_title = $row['category_title'];
    $category_id = $row['category_id'];
    ?>
        <tr>
            <td><?php echo $number?></td>
            <td><?php echo $category_title?></td>
            <td><a href='index.php?edit_category=<?php echo $category_id?> '>edit</a></td>
            <td><a href='index.php?delete_category=<?php echo $category_id ?>'>delete</a></td>
        </tr>

        <?php
        $number++;
        }
        ?>

    </tbody>
</table>