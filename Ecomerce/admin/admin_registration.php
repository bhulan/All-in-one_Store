<?php
include('../includes/connect.php');
include('../functions/common_function.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin -Registration</title>
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
            New Admin Registration
        </h2>
        <div class="row d-flex align-itmes-center justify-content-center">
            <div class="lg-l2 col-xl-6">
                <form action="" method="post">
                    <div class="from-outline">
                        <label for="admin_adminname" class="form-label ">admin name</label>
                        <input type="text" id="admin_adminname" class="form-control mb-2"
                            placeholder="Enter your name" autocomplete="off" required name="admin_adminname" />
                    </div>

                    <div class="from-outline">
                        <label for="admin_email" class="form-label ">E-mail</label>
                        <input type="email" id="admin_email" class="form-control mb-2"
                            placeholder="Enter your admin email"  required name="admin_email" />
                    </div>

                    <div class="from-outline">
                        <label for="admin_password" class="form-label mb-2">Password</label>
                        <input type="password" id="admin_password" class="form-control mb-2"
                            placeholder="Enter your password" autocomplete="off" required name="admin_password" />
                    </div>
                    <div class="from-outline">
                        <label for="conf_admin_password" class="form-label mb-2"> Confirm Password</label>
                        <input type="password" id="conf_admin_password" class="form-control mb-2"
                            placeholder="Enter your confirm Password" autocomplete="off" required
                            name="conf_admin_password" />
                    </div>
                    <div class="from-outline">
                        <label for="admin_address" class="form-label ">Address</label>
                        <input type="text" id="admin_address" class="form-control mb-2"
                            placeholder="Enter your address" autocomplete="off" required name="admin_address" />
                    </div>


                    <div class="from-outline">
                        <label for="admin_contact" class="form-label ">Contact</label>
                        <input type="number" id="admin_contact" class="form-control mb-2"
                            placeholder="Enter your contacts" autocomplete="off" required name="admin_contact" />
                    </div>
                <div class="mt-4 pt-2">
                    <input type="submit" value="Register" class="bg-info mb-2 px-3 py-2 mb-4" name="admin_regisier"/>
                    <p class="small fw-bold mt-2 pt-1">Already have an account? <a class="text-success" href="admin_login.php">Login</a></p>
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

<!-- //php code for take admin resgistration info -->
<?php
if(isset($_POST['admin_regisier'])){
    $admin_adminname=$_POST['admin_adminname'];
    $admin_email=$_POST['admin_email'];
    $admin_password=$_POST['admin_password'];
    $conf_admin_password=$_POST['conf_admin_password'];

    $admin_address=$_POST['admin_address'];
    $admin_contact=$_POST['admin_contact'];
    $admin_ip=getIPAddress();

    //checking for duplicats
    $select_query="Select * from `admin_table` where admin_email='$admin_email'";
    $result_check=mysqli_query($con, $select_query);
    $rows_count=mysqli_num_rows($result_check);
    if($rows_count>0){
        echo "<script>alert('This admin are already exists')</script>";
        echo "<script>window.open('admin_registration.php','_self')</script>";

 
    }
    else if($admin_password!=$conf_admin_password){
        echo "<script>alert('Confirm password should be same as your password')</script>";
        echo "<script>window.open('admin_registration.php','_self')</script>";


    }
    else{
     $hashed_password = password_hash($admin_password, PASSWORD_DEFAULT);
    //insert query for inserting rejistration element
    $insert_query="insert into `admin_table` (adminname,admin_email,admin_password,admin_ip,admin_address,admin_mobile) values('$admin_adminname','$admin_email','$hashed_password','$admin_ip','$admin_address','$admin_contact')";
    $result=mysqli_query($con,$insert_query);
    echo "<script>alert('admin Registration has been successfull')</script>";

    }

   //selecting cart item
   $select_cart_item="Select * from `cart_details` where ip_adderss='$admin_ip'";
   $result_cart=mysqli_query($con,$select_cart_item);
   $rows_count=mysqli_num_rows($result_cart);
   if($rows_count>0){
    $_SESSION['adminname']=$admin_adminname;
    echo "<script>alert('You have items in your cart')</script>";
    echo "<script>window.open('cheekout.php','_self')</script>";


   }
   else{
    echo "<script>window.open('../index.php','_self')</script>";

   }

}
?>