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
    <title>Admin Dashbord</title>
    <link rel="stylesheet" href="adminstyle.css">

    <!-- css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- font link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
        integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <style>
        body {
            overflow-x: hidden;
        }
        #pimage{
            width:100px;
            height: 10%;
            object-fit: contain;
        }
        #peimage{
            width: 80px;
            height: 80px;
            object-fit: contain;
        }
    </style>

</head>

<body>
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <img src="../images/logo.jpg" alt="loading" class="logo">
                <nav class="navbar navbar-expand-lg navbar-light bg-info ">
                    <div class="navbar-nav">
                        <div class="nav-item">
                        <?php 
                if(!isset($_SESSION['adminname']))
                {
                    echo "<li class='nav-item'>
                    <a class='nav-link' href='#'>Welcome guest</a>
                </li>";
                }
                else{
                    echo " <li class='nav-item'>
                    <a class='nav-link' href='#'>Welcome <span class='text-warning'> <strong>".$_SESSION['adminname']."</strong></span></a>
                </li>";
                }
                ?>
                        </div>
                    </div>
                </nav>

            </div>

        </nav>
        <div class="bg-light">
            <h3 class="text-center p-3">Manage Your store</h3>
        </div>
        <div class="row sticky-sm-top">
            <div class="col-md-12 bg-secondary p-1 align-items-center card sticky-top">
                <div class="p-3">
                    <!-- <a href="#" class=""><img  src="../images/dairymilk.jpg" alt="" id="adminlogo" ></a> -->
                    <?php 
                if(!isset($_SESSION['adminname']))
                {
                    echo "
            <h3 class='text-center text-light' >Welcome guest</h3>";
                }
                else{
                    echo " 
                <h3 class='text-cemter text-light' >Welcome <span class='text-warning'> <strong>".$_SESSION['adminname']."</strong></span></h3>";
                }
                ?>                </div>
                <div class="button text-center ">
                    <button class="my-1"><a href="insert_product.php" class="nav-link text-light bg-info my-1  ">Insert products</a></button>
                    <button class="my-1"><a href="index.php?view_products" class="nav-link text-light bg-info my-1">View products</a></button>
                    <button class="my-1"><a href="index.php?insert_catagory" class="nav-link text-light bg-info my-1">Insert catagories</a></button>
                    <button class="my-1"><a href="index.php?view_catagory" class="nav-link text-light bg-info my-1">View catagories</a></button>
                    <button class="my-1"><a href="index.php?view_user" class="nav-link text-light bg-info my-1">List user</a></button>
                    <button class="my-1"><a href="logout.php" class="nav-link text-light bg-info my-1">Log out</a></button>
                </div>
            </div>
        </div>
    </div>

    <div class="container my-3">
        <?php 
        if(isset($_GET['insert_catagory'])){
            include('insert_catagories.php');
        }
        // if(isset($_GET['insert_brands'])){
        //     include('insert_brands.php');
        // }
        if(isset($_GET['view_products'])){
            include('view_products.php');
        }
        if(isset($_GET['edit_products'])){
            include('edit_products.php');
        }
        if(isset($_GET['delete_products'])){
            include('delete_products.php');
        }
        if(isset($_GET['view_catagory'])){
            include('view_catagory.php');
        }
        if(isset($_GET['edit_catagory'])){
            include('edit_catagory.php');
        }
        if(isset($_GET['delete_catagory'])){
            include('delete_catagory.php');
        }
        if(isset($_GET['view_user'])){
            include('view_user.php');
        }
        ?>
    </div>
    <br>
     <div class="bg-info text-center p-3 fixed-bottom"  id="foot">
        All rights reserved-2022
    </div>
    </div>










    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>

</html>