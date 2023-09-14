<?php 
if(isset($_GET['edit_products'])){
    $edit_id=$_GET['edit_products'];
    $get_data="Select * from `products` where product_id=$edit_id";
    $result=mysqli_query($con,$get_data);
    $row=mysqli_fetch_assoc($result);
    $product_title=$row['product_title'];
    $product_description=$row['product_description'];
    $product_keywords=$row['product_keywords'];
    $catagory_id=$row['catagory_id'];
    $product_image1=$row['product_image1'];
    $product_price=$row['product_price'];

    $select_catagory="Select * from `catagories`where catagory_id=$catagory_id";
    $result_query=mysqli_query($con,$select_catagory);
    $row_catagory=mysqli_fetch_assoc($result_query);
    $catagory_title=$row_catagory['catagory_title'];
    




}
?>



<body class="bg-light">
    <div class="container mt-3">

        <h1 class="text-center text-warning">Edit Products</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_title" class="form-label ">Product title</label>
                <input type="text" name="product_title" id="product_title" class="form-control"
                    value="<?php echo $product_title ?>" autocomplete="off" required>
            </div>

            <div class="form-outline mb-4 w-50 m-auto">
                <label for="description" class="form-label ">Product Description</label>
                <input type="text" name="description" id="description" class="form-control"
                    value="<?php echo $product_description ?>" autocomplete="off" required>
            </div>

            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product__keywords" class="form-label ">Product Keyword</label>
                <input type="text" name="product__keywords" id="product__keywords" class="form-control"
                    value="<?php echo $product_keywords ?>" autocomplete="off" required>
            </div>

            <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_catagory" id="" class="form-select">
                    <option value="<?php echo $catagory_title ?>">
                        <?php echo $catagory_title ?>
                    </option>
                    <?php
                    $select_query="Select * from `catagories`";
                    $result_query=mysqli_query($con,$select_query);
                    while($row=mysqli_fetch_assoc($result_query)){
                        $catagory_title=$row['catagory_title'];
                        $catagory_id=$row['catagory_id'];
                        echo " <option value='$catagory_id'> $catagory_title</option>";
                    }

                    ?>
                    <!-- <option value=""> chips</option>
                    <option value=""> chokorjr</option>
                    <option value=""> selry</option> -->
                </select>
            </div>

            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product__image1" class="form-label ">Product Image</label>
                <div class="d-flex">
                    <input type="file" name="product__image1" id="product__image1" class="form-control w-90 m-auto"
                        required>
                    <img src="../admin/product_images/<?php echo $product_image1 ?>" alt="loading" id="peimage">
                </div>

            </div>



            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product__price" class="form-label ">Product price</label>
                <input type="text" name="product__price" id="product__price" class="form-control"
                    value="<?php echo $product_price ?>" autocomplete="off" required>
            </div>

            <div class="form-outline mb-4 w-50 m-auto">
                <input type="submit" name="edit_product" class="btn btn-primary" value="Update product">

            </div>

        </form>
        <br><br>

    </div>

    <!-- editing products -->
    <?php 
    if(isset($_POST['edit_product'])){
        $product_title=$_POST['product_title'];
        $description=$_POST['description'];
        $product__keywords=$_POST['product__keywords'];
        $product_catagory=$_POST['product_catagory'];
        $product__price=$_POST['product__price'];

        $product__image1=$_FILES['product__image1']['name'];

        $tmp__image1=$_FILES['product__image1']['tmp_name'];

        move_uploaded_file($tmp__image1,"./product_images/$product__image1");


        //for update

        $update_product="update `products` set product_title='$product_title',product_description='$description',product_keywords='$product__keywords',catagory_id='$product_catagory',product_image1='$product__image1',product_price='$product__price',date=NOW() where product_id=$edit_id";

       $result_update=mysqli_query($con,$update_product);
       if($result_update){
        echo "<script>alert('Product updated successfully')</script>";
        echo "<script>window.open('index.php','_self')</script>";

       }
        


    }
    
    
    ?>