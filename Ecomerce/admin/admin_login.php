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
    <title>admin -Login</title>
    <link rel="stylesheet" href="style.css">
   

    <!-- css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- font link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
        integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <div class="container-fluid">
        <h2 class="text-center m-3">
             admin Login
        </h2>
        <div class="row d-flex align-itmes-center justify-content-center">
            <div class="lg-l2 col-xl-6">
                <form action="" method="post">
                    <div class="from-outline">
                        <label for="admin_adminname" class="form-label ">Admin name</label>
                        <input type="text" id="admin_adminname" class="form-control mb-2"
                            placeholder="Enter your adminname" autocomplete="off" required name="admin_adminname" />
                    </div>

                   

                    <div class="from-outline">
                        <label for="admin_password" class="form-label mb-2">Password</label>
                        <input type="password" id="admin_password" class="form-control mb-2"
                            placeholder="Enter your password" autocomplete="off" required name="admin_password" />
                    </div>
                    
                   


                   
                <div class="mt-4 pt-2">
                    <input type="submit" value="Login" class="bg-info mb-2 px-3 py-2 mb-4" name="admin_login"/>
                    <p class="small fw-bold mt-2 pt-1">New to here? <a class="text-success" href="admin_registration.php" name="register" onclick="alert('Yor are not authorize to access this page')">Register</a></p>
                    <!-- admin_registration.php use it when you give assecc to regestred admin-->
                </div>
                </form>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>

</html>


<?php 
if(isset($_POST['admin_login'])){
    $admin_adminname=$_POST['admin_adminname'];
    $admin_password=$_POST['admin_password'];
    $select_query="Select * from `admin_table` where adminname='$admin_adminname'";
    $result=mysqli_query($con,$select_query);
    $row_count=mysqli_num_rows($result);
    $row_data=mysqli_fetch_assoc($result);
    $verify=password_verify($admin_password,$row_data['admin_password']);
    $admin_ip=getIPAddress();
    //cartitem
    $select_query_cart="Select * from `cart_details` where ip_address='$admin_ip'";
    $select_cart=mysqli_query($con,$select_query_cart);
    $row_count_cart=mysqli_num_rows($select_cart);



    if($row_count>0 and $verify==1){
        $_SESSION['adminname']=$admin_adminname;
            // echo "<script>alert('LOgin successfully')</script>";
            if($row_count==1 and $row_count_cart==0){
                $_SESSION['adminname']=$admin_adminname;
        echo "<script>alert('Login successfull')</script>";
        echo "<script>window.open('index.php','_self')</script>";

  
            }
            else{
                $_SESSION['adminname']=$admin_adminname;
                echo "<script>alert('Login successfully')</script>";
            echo "<script>window.open('index.php','_self')</script>";

            }


    }
    else{
        echo "<script>alert('Invalid adminname or password')</script>";

    }


}

 
?>