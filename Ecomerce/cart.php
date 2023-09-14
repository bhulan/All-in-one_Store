<?php 
include('includes/connect.php');
include('functions/common_function.php');
session_start();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Commrce--Cart section</title>
    <link rel="stylesheet" href="style.css">

    <!-- css link -->
    <style>
        .cart_img {
            width: 50px;
            height: 50px;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- font link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
        integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg navbar-light bg-info box-shadow: 4px gray">
            <div class="container-fluid">
                <img src="./images/logo.jpg" alt="loading" class="logo">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="display.php">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="user/user_registration.php">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">contacts</a>
                        </li>
                        <!-- <li class="nav-item">
                             <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup> 
                                    <?php cart_item() ?>
                                </sup></a>
                        </li> -->

                    </ul>
                </div>
            </div>
        </nav>
        <?php
      cart();
        ?>
        <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
            <ul class="navbar-nav me-auto">
                <?php 
                if(!isset($_SESSION['username']))
                {
                    echo "<li class='nav-item'>
                    <a class='nav-link' href='#'>Welcome guest</a>
                </li>";
                }
                else{
                    echo " <li class='nav-item'>
                    <a class='nav-link' href='#'>Welcome <span class='text-warning'> <strong>".$_SESSION['username']."</strong></span></a>
                </li>";
                }
                if(!isset($_SESSION['username']))
                {
                    echo " <li class='nav-item'>
                    <a class='nav-link' href='./user/user_login.php'>Login</a>
                </li>";
                }
                else{
                    echo " <li class='nav-item'>
                    <a class='nav-link' href='./user/logout.php'>Logout</a>
                </li>";
                }
                if(!isset($_SESSION['username']))
                {
                    echo " <li class='nav-item'>
                    <a class='nav-link' href='./user/user_login.php'>Profile <i class='fa-solid fa-user'></i></a>
                </li>";
                }
                else{
                    echo " <li class='nav-item'>
                    <a class='nav-link' href='./user/profile.php'>Profile <i class='fa-solid fa-user'></i></a>
                </li>";
                }
                ?>

            </ul>
        </nav>




        <div class="bg-light">
            <h3 class="text-center">
                My store
            </h3>
            <p class="text-center">
                Lorem, ipsum dolor sit , dolores pariatur dolorum mollitia quae at suscipit.
            </p>
        </div>

        <!-- //for cart table -->
        <div class="container">
            <div class="row">
                <form action="" method="post">
                    <table class="table table-bordered text-center">

                        <!-- //fordisplay all cart dynamically -->
                        <?php

                    global $con;

                    $get_ip_address = getIPAddress();
                    $total_price=0;
                    $cart_query="Select * from `cart_details` where ip_address='$get_ip_address'";
                    $result_query=mysqli_query($con,$cart_query);
                    $result_count=mysqli_num_rows($result_query);
                    if($result_count>0){
                        echo " <thead>
                        <th>Product Titel</th>
                        <!-- <th>Product Image</th> -->
                        <!-- <th>Quantity</th> -->
                        <th>Total Price</th>
                        <th>Remove</th>
                        <th colspan='2'>Operation</th>
                    </thead>
                    <tbody>";
                    while($row=mysqli_fetch_array($result_query)){
                    $product_id=$row['product_id'];
                    $select_products="Select * from `products` where product_id='$product_id'";
                    $result_products=mysqli_query($con,$select_products);
                    while($row_product_price=mysqli_fetch_array($result_products)){
                        $product_price=array($row_product_price['product_price']);
                        $price_table=$row_product_price['product_price'];
                         $product_title=$row_product_price['product_title'];
                        // $product_image1=$row_product_price['product_image1'];

                        $product_values=array_sum($product_price);
                        $total_price+= $product_values;

                    ?>
                        <tr>
                            <td>
                                <?php echo $product_title ?>
                            </td>
                            <!-- <td><input type="text" name="qty" id="" class="from-input w-50 " ></td> -->
                            <td>
                                <?php echo $price_table ?>/-
                            </td>
                            <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id ?>"></td>
                            <td>
                                <!-- <button class="bg-secondary">Update</button> -->
                                <!-- <input type="submit" class="bg-secondary p-1" value="Update Cart" name="update_cart"> -->

                                <input type="submit" class="bg-danger p-1" value="Remove Cart item" name="remove_cart">

                            </td>
                        </tr>
                        <?php 
                    
                }
            }
        }
        else{
            echo "<h2 class='text-danger text-center'>Cart is empty</h2>";
        }
            ?>
                        </tbody>
                    </table>

                    <div class="d-flex">
                        <?php 
                         $get_ip_address = getIPAddress();
                    
                         $cart_query="Select * from `cart_details` where ip_address='$get_ip_address'";
                         $result_query=mysqli_query($con,$cart_query);
                         $result_count=mysqli_num_rows($result_query);
                         if($result_count>0){
                            echo " <h3 class='px-3'>Grand Total:-<strong class='text-info'>
                             $total_price /-
                        </strong></h3>
                        <input type='submit' class='bg-warning mb-2 mx-2' value='Continue to shopping' name='continue_shopping'>       
                         <button class='bg-primary p-1 m-2 text-success '> <a href='./user/cheekout.php' class='text-light text-decoration-none'>Cheekout</a></button>  ";
                         }
                         else{
                            echo " <input type='submit' class='bg-warning mb-3 p-1' value='Continue to shopping' name='continue_shopping'>       ";
                         }
                         if(isset($_POST['continue_shopping']))
                         echo "<script>window.open('index.php', '_self')</script>"
                        ?>

                    </div>
            </div>
        </div>
        <!-- for remove cart -->
        <?php 
         function remove_cart_item(){
            global $con;
            if(isset($_POST['remove_cart'])){
                foreach($_POST['removeitem'] as $remove_id){
                    echo $remove_id;
                    $delete_query="Delete from `cart_details` where product_id=$remove_id";
                    $run_delete=mysqli_query($con,$delete_query);
                    if($run_delete){
                        echo "<script>window.open('cart.php','_self')</script>";
                    }
                }
            }
         }
         echo $remove_item=remove_cart_item();
         ?>


        <div class="bg-info text-center p-3 fixed-bottom">
            All rights reserved-2022
        </div>

    </div>




        <!-- script---->



        <!-- <div class="bg-info text-center">
        All rights reserved-2022
    </div> -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous"></script>
</body>

</html>