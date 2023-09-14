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
    <title>E-Commrce</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body{
    overflow-x: hidden;
}
.myshope {
			font-size: 50px;
			color: #ff9900;
			animation: myshope-animation 1s ease-in-out infinite;
			transition: color 0.3s ease-in-out;
			cursor: pointer;
		}

		@keyframes myshope-animation {
			0% {
				color: #ff9900;
			}
			25% {
				color: #ff33cc;
			}
			50% {
				color: #00ccff;
			}
			75% {
				color: #66cc33;
			}
			100% {
				color: #ff9900;
			}
		}
    </style>

    <!-- css link -->
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
                        <li class="nav-item" >
                            <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item() ?></sup></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Total price: <?php total_cart_price(); ?>/-</a>
                        </li>
                    </ul>
                    <form class="d-flex" action="search_product.php" method="get">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
                        <!-- <button class="btn btn-outline-success" type="submit">Search</button> -->
                        <input type="submit" value="Search" class="btn btn-outline-dark" name="search_data_product">
                    </form>
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
            <span class="myshope ">My store</span>
            </h3>
            <p class="text-center">
                Lorem, ipsum dolor sit , dolores pariatur dolorum mollitia quae at suscipit.
            </p>
        </div>
        <div class="row">
            <div class="col-md-10">
                <!-- for products -->
                <div class="row">

                    <!--Dynamib=c data showing-->

                    <?php 
                     getall_products();
                     get_uniquecatagories();
           //i have use same function
                
                ?>
                   
                </div>


            </div>
            <div class="col-md-2 bg-secondary p-0">
                <ul class="navbar-nav me-auto">
                   
                    <li class="nav-item bg-info">
                        <a href="#" class="nav-link text-center text-light">
                            <h4>Catagories</h4>
                        </a>
                    </li>
                    <?php 
                    get_catagories();
                    
                    
                    ?>
                </ul>
            </div>
            <!-- side nav -->

        </div>
        <div class="bg-info text-center p-3">
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