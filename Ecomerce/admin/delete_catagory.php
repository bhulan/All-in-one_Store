<?php 
if(isset($_GET['delete_catagory'])){
    $delete_id=$_GET['delete_catagory'];
    //for delate from database
    $delete_cat="Delete from `catagories` where catagory_id=$delete_id";
    $result_cat=mysqli_query($con,$delete_cat);
    if($result_cat){
        echo "<script>alert('Product Delated successfully')</script>";
        echo "<script>window.open('index.php','_self')</script>";
    }
}
?>