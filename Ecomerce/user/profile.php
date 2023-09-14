<?php 
include('../includes/connect.php');
include('../functions/common_function.php');
session_start();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Commrce_my_profile</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body{
    overflow-x: hidden;
}
    </style>

    <!-- css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- font link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
        integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <style>
        .logo{
    width: 6%;;
    height: 6%;
}
.profile{
    width:200px;
}
 </style>

</head>

<body>
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg navbar-light bg-info box-shadow: 4px gray">
            <div class="container-fluid">
                <img src="../images/logo.jpg" alt="loading" class="logo">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="../display.php">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="profile.php">My account</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                        <li class="nav-item" >
                            <a class="nav-link" href="../cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item() ?></sup></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Total price: <?php total_cart_price(); ?>/-</a>
                        </li>
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
                    <a class='nav-link' href='user_login.php'>Login</a>
                </li>";
                }
                else{
                    echo " <li class='nav-item'>
                    <a class='nav-link' href='logout.php'>Logout</a>
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
      
       <div class="d-flex text-center justify-content-center align-itmes-center  ">
       
 <ul class="navbar-nav bg-primary text-center m-4" >
    <li class="nav-itme bg-secondary p-1 m-2 w-80">
        <a class="text-decoration-none" href=""> <h1 class="text-warning ">YOUR PROFILE</h1></a> 
    </li>
    <li class="nav-itme bg-secondary p-1 m-2 ">
        <a class="text-decoration-none" href="profile.php?my_account"> <h3 class="text-white ">My Account <i class="fa-solid fa-user"></i></h3></a> 
    </li>
    <li class="nav-itme bg-secondary p-1 m-2 ">
        <a class="text-decoration-none" href="../index.php"> <h3 class="text-white ">View Products</h3></a> 
    </li>
    <li class="nav-itme bg-secondary p-1 m-2 ">
        <a class="text-decoration-none" href="profile.php?edit_account"> <h3 class="text-white ">Edit Account <i class="fa-solid fa-message-pen"></i></h3></a> 
    </li>
    <li class="nav-itme bg-secondary p-1 m-2">
        <a class="text-decoration-none" href="../cart.php"> <h3 class="text-white ">Pay orders <i class="fa-solid fa-bags-shopping"></i></h3></a> 
    </li>
    
    <li class="nav-itme bg-secondary p-1 m-2">
        <a class="text-decoration-none" href="logout.php"> <h3 class=" text-danger">Logout <i class="fa-solid fa-arrow-right-from-bracket"></i></h3></a> 
    </li>
 </ul>
  <div >
       
  </div>
  <?php
        if(isset($_GET['edit_account'])){
            include('edit_account.php');
        }
        if(isset($_GET['my_account'])){
            include('my_account.php');
        }
        ?>
        
       </div>
       
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