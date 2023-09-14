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
    <title>User -Registration</title>
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
            New User Registration
        </h2>
        <div class="row d-flex align-itmes-center justify-content-center">
            <div class="lg-l2 col-xl-6">
                <form action="" method="post">
                    <div class="from-outline">
                        <label for="user_username" class="form-label ">Username</label>
                        <input type="text" id="user_username" class="form-control mb-2"
                            placeholder="Enter your username" autocomplete="off" required name="user_username" />
                    </div>

                    <div class="from-outline">
                        <label for="user_email" class="form-label ">E-mail</label>
                        <input type="email" id="user_email" class="form-control mb-2"
                            placeholder="Enter your user email" autocomplete="off" required name="user_email" />
                    </div>

                    <div class="from-outline">
                        <label for="user_password" class="form-label mb-2">Password</label>
                        <input type="password" id="user_password" class="form-control mb-2"
                            placeholder="Enter your password" autocomplete="off" required name="user_password" />
                    </div>
                    <div class="from-outline">
                        <label for="conf_user_password" class="form-label mb-2"> Confirm Password</label>
                        <input type="password" id="conf_user_password" class="form-control mb-2"
                            placeholder="Enter your confirm Password" autocomplete="off" required
                            name="conf_user_password" />
                    </div>
                    <div class="from-outline">
                        <label for="user_address" class="form-label ">Address</label>
                        <input type="text" id="user_address" class="form-control mb-2"
                            placeholder="Enter your address" autocomplete="off" required name="user_address" />
                    </div>


                    <div class="from-outline">
                        <label for="user_contact" class="form-label ">Contact</label>
                        <input type="number" id="user_contact" class="form-control mb-2"
                            placeholder="Enter your contacts" autocomplete="off" required name="user_contact" />
                    </div>
                <div class="mt-4 pt-2">
                    <input type="submit" value="Register" class="bg-info mb-2 px-3 py-2 mb-4" name="user_regisier"/>
                    <p class="small fw-bold mt-2 pt-1">Already have an account? <a class="text-success" href="user_login.php">Login</a></p>
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

<!-- //php code for take user resgistration info -->
<?php
if(isset($_POST['user_regisier'])){
    $user_username=$_POST['user_username'];
    $user_email=$_POST['user_email'];
    $user_password=$_POST['user_password'];
    $conf_user_password=$_POST['conf_user_password'];

    $user_address=$_POST['user_address'];
    $user_contact=$_POST['user_contact'];
    $user_ip=getIPAddress();

    //checking for duplicats
    $select_query="Select * from `user_table` where user_email='$user_email'";
    $result_check=mysqli_query($con, $select_query);
    $rows_count=mysqli_num_rows($result_check);
    if($rows_count>0){
        echo "<script>alert('This user are already exists')</script>";
 
    }
    else if($user_password!=$conf_user_password){
        echo "<script>alert('Confirm password should be same as your password')</script>";
        echo "<script>window.open('user_registration.php','_self')</script>";

    }
    else{
    $hashed_password = password_hash($user_password, PASSWORD_DEFAULT);
    //insert query for inserting rejistration element
    $insert_query="insert into `user_table` (username,user_email,user_password,user_ip,user_address,user_mobile) values('$user_username','$user_email','$hashed_password','$user_ip','$user_address','$user_contact')";
    $result=mysqli_query($con,$insert_query);
    echo "<script>alert('User Registration has been successfull')</script>";
    }

   //selecting cart item
   $select_cart_item="Select * from `cart_details` where ip_adderss='$user_ip'";
   $result_cart=mysqli_query($con,$select_cart_item);
   $rows_count=mysqli_num_rows($result_cart);
   if($rows_count>0){
    $_SESSION['username']=$user_username;
    echo "<script>alert('You have items in your cart')</script>";
    echo "<script>window.open('cheekout.php','_self')</script>";


   }
   else{
    echo "<script>window.open('../index.php','_self')</script>";

   }

}
?>