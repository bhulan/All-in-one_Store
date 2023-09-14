<?php 
if(isset($_GET['my_account'])){
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
       <div>
       <h3 class="text-center text-success text-decoration-underline  ">
            YOUR ACCOUNT DETAILS
        </h3>
        <h3 class="text-center text-success ">
            <span class="text-primary">Username:- </span><span class="text-secondary"><?php echo $username ?></span><br><br>
            <span class="text-primary">User Email:- </span><span class="text-secondary"><?php echo $user_email ?></span><br><br>

            <span class="text-primary">User Address:- </span><span class="text-secondary"><?php echo $user_address ?></span><br><br>

            <span class="text-primary">User Mobile:- </span><span class="text-secondary"><?php echo $user_mobile ?></span>

        </h3>
       </div>
        
        
</body>
</html>