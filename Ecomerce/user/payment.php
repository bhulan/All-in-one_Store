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
    <title>Ecomerce payment page</title>
    <!-- css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        img {
            width: 600px;
            height: 600px;
            object-fit: contain;
        }

        #offline {
            background-image: url('../images/cash.jpg');
            width: 300px;
            height: 300px;
            object-fit: contain;
        }

        .pay {
            text-decoration: none;
        }
        .logo{
    width: 6%;;
    height: 6%;
}
    </style>
    <!-- font link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
        integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <?php 
    $user_ip=getIPAddress();
    $get_user="Select * from `user_table` where user_ip='$user_ip'";
    $result=mysqli_query($con,$get_user);
    $run_query=mysqli_fetch_array($result);
    $user_id=$run_query['user_id'];
    ?>
    <div class="container">
        <div class="text-center text-success">
            <h1> Payment Option</h1>
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-md-6">
                    <a href="https://www.paytm.com" target="_blank"><img src="../images/payment.jpg" alt="loading"></a>
                </div>
                <div class="col-md-6" id="offline">
                    <a href="ordered.php?user_id=<?php echo $user_id?>" target="_blank">
                        <h1 class="pay text-center text-warning">Pay on Cash</h1>
                    </a>
                </div>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>

</html>