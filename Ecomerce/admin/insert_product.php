<?php 
include('../includes/connect.php');
if(isset($_POST['insert_product'])){
   $product_title=$_POST['product_title'];
   $description=$_POST['description'];
   $product__keywords=$_POST['product__keywords'];
   $product_catagory=$_POST['product_catagory'];
   $product__price=$_POST['product__price'];
   $product__status='true';
   
   
   //images
   $product__image1=$_FILES['product__image1']['name'];
   $product__image2=$_FILES['product__image2']['name'];
   $product__image3=$_FILES['product__image3']['name'];


   $tmp__image1=$_FILES['product__image1']['tmp_name'];
   $tmp__image2=$_FILES['product__image2']['tmp_name'];
   $tmp__image3=$_FILES['product__image3']['tmp_name'];


   if($product_title== '' or $description=='' or $product__keywords=='' or $product_catagory=='' or $product__price=='' or $product__image1==''){
    echo "<script> alert('plese fill all the info')</script>";
    exit();
   }
   else{
       move_uploaded_file($tmp__image1,"./product_images/$product__image1");
       move_uploaded_file($tmp__image2,"./product_images/$product__image2");

       move_uploaded_file($tmp__image3,"./product_images/$product__image3");


       //insert

       $insert_products="insert into `products` (product_title,product_description,product_keywords,catagory_id,product_image1,product_image2,product_image3,product_price,date,status)
        values ('$product_title','$description','$product__keywords','$product_catagory','$product__image1','$product__image2','$product__image3','$product__price',NOW(),'$product__status')";

        $result_query=mysqli_query($con,$insert_products);
        if($result_query){
            echo "<script> alert('Products inserted successfuly')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        }

   }







}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Product-Admin</title>
    <link rel="stylesheet" href="adminstyle.css">

    <!-- css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- font link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
        integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="bg-light">
    <div class="container mt-3">

        <h1 class="text-center">Insert Products</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_title" class="form-label ">Product titler</label>
                <input type="text" name="product_title" id="product_title" class="form-control" placeholder="Enter product title" autocomplete="off" required>
            </div>

            <div class="form-outline mb-4 w-50 m-auto">
                <label for="description" class="form-label ">Product Description</label>
                <input type="text" name="description" id="description" class="form-control" placeholder="Enter product title" autocomplete="off" required>
            </div>

            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product__keywords" class="form-label ">Product Keyword</label>
                <input type="text" name="product__keywords" id="product__keywords" class="form-control" placeholder="Enter product title" autocomplete="off" required>
            </div>

            <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_catagory" id="" class="form-select">
                    <option value=""> select Catagory</option>
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
                <label for="product__image1" class="form-label ">Product Image1</label>
                <input type="file" name="product__image1" id="product__image1" class="form-control"  required>
            </div>



            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product__price" class="form-label ">Product price</label>
                <input type="text" name="product__price" id="product__price" class="form-control" placeholder="Enter product price" autocomplete="off" required>
            </div>

            <div class="form-outline mb-4 w-50 m-auto">
                <input type="submit" name="insert_product" class="btn btn-primary" value="insert product">

            </div>
            

        </form>

    </div>













    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>

</html>