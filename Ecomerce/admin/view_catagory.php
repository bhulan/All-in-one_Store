<h1 class="text-center text-success">All Products</h1>

<table class="table table-bordered mt-5">
    <thead class="bg-info text-center">
        <tr>
            <th>Sl no</th>
            <th>Category Title</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light text-center">
        <?php 
        $get_products="Select * from `catagories`";
        $result=mysqli_query($con,$get_products);
        $number=0;
        while($row=mysqli_fetch_assoc($result)){
              $catagory_id=$row['catagory_id'];
              $catagory_title=$row['catagory_title'];
              $number++;
              ?>
              <tr>
              <td><?php echo"$number"?></td>
              <td><?php echo"$catagory_title"?></td>
              <td><a href='index.php?edit_catagory=<?php echo $catagory_id ?>' class='text-light'><i class='fa-solid fa-pen-to-square'></i></a></td>
              <td><a href='index.php?delete_catagory=<?php echo $catagory_id ?>' class='text-danger'><i class='fa-solid fa-trash'></i></a></td>
              
          </tr>
          <?php
        }
        
        ?>
        

    </tbody>

</table>
<br>
