 <h1 class="text-center text-success">All Products</h1>

<table class="table table-bordered mt-5">
    <thead class="bg-info text-center">
        <tr>
            <th>Product id</th>
            <th>Product Title</th>
            <th>Product image</th>
            <th>Product Price</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light text-center">
        <?php 
        $get_products="Select * from `products`";
        $result=mysqli_query($con,$get_products);
        $number=0;
        while($row=mysqli_fetch_assoc($result)){
              $product_id=$row['product_id'];
              $product_title=$row['product_title'];
              $product_image1=$row['product_image1'];
              $product_price=$row['product_price'];
              $number++;
              ?>
              <tr>
              <td><?php echo"$number"?></td>
              <td><?php echo"$product_title"?></td>
              <td><img src='./product_images/<?php echo"$product_image1"?>' id='pimage'></td>
              <td><?php echo"$product_price"?></td>
              <td><a href='index.php?edit_products=<?php echo $product_id ?>' class='text-light'><i class='fa-solid fa-pen-to-square'></i></a></td>
              <td><a href='index.php?delete_products=<?php echo $product_id ?>' class='text-danger'><i class='fa-solid fa-trash'></i></a></td>
              
          </tr>
          <?php
        }
        
        ?>
        

    </tbody>

</table>
<br>
