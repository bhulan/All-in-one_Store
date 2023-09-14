<?php 
if(isset($_GET['edit_account'])){
    $user_session_name=$_SESSION['username'];
    $select_query="Select * from `user_table` where username='$user_session_name'";
    $result_query=mysqli_query($con,$select_query);
    $row_fetch=mysqli_fetch_assoc($result_query);
     $user_id=$row_fetch['user_id'];
     $username=$row_fetch['username'];
     $user_email=$row_fetch['user_email'];
     $user_address=$row_fetch['user_address'];
     $user_mobile=$row_fetch['user_mobile'];
}

     if(isset($_POST['user_update'])){
        $update_id=$user_id;
        $username=$_POST['user_username'];
        $user_email=$_POST['user_email'];
        $user_address=$_POST['user_address'];
        $user_mobile=$_POST['user_mobile'];

        //update
        $update_data="update `user_table` set username='$username',user_email='$user_email',user_address='$user_address',user_mobile='$user_mobile'where user_id=$update_id";
        $result_query_update=mysqli_query($con,$update_data);
        if($result_query_update){
            echo "<script>alert('User data updated successfully')</script>";
            echo "<script>window.open('logout.php','_self')</script>";

        }
     }


?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-COMERCE_edit_Account</title>
</head>
<body>
    
    <form action="" method="post">
        <h3 class="text-center text-success ">
            Edit account
        </h3>
        <div class="form-outline mb-4">

            <input type="text" class="form-control w-100 m-auto" name="user_username" value="<?php echo $username ?>">
        </div>
        <div class="form-outline mb-4">

            <input type="email" class="form-control w-100 m-auto" name="user_email" value="<?php echo $user_email ?>">
        </div>
        <div class="form-outline mb-4">

            <input type="text" class="form-control w-100 m-auto" name="user_address" value="<?php echo $user_address?>">
        </div>
        <div class="form-outline mb-4">

   <h6>Enter Mobile</h6>
            <input type="number" class="form-control w-100 m-auto" name="user_mobile" value="<?php echo $user_mobile?>">
        </div>
        <div class="form-outline mb-4">

            <input type="submit" class="btn btn-primary" name="user_update" value="Update">
        </div>

    </form>
</body>
</html>