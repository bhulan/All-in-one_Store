<?php
include('../includes/connect.php');
if(isset($_POST['insert_cat'])){
    $catagory_title=$_POST['cat_title'];
    //checeeek for multi name
    $select_query="Select * from `catagories` where catagory_title= '$catagory_title'";
    $result_select=mysqli_query($con,$select_query);
   $number=mysqli_num_rows( $result_select);
   if($number>0){
    echo "<script>alert('This Category is already exists')</script>";

   }
   else{
    $insert_query="insert into `catagories` (catagory_title) values ('$catagory_title') ";
    $result=mysqli_query($con,$insert_query);
    if($result){
        echo "<script>alert('Catagori has been inserted success fully')</script>";
    }
}}
?>

<h2 class="text-center">Insert Categories</h2>
<form action="" method="post" class="mb-2">
    <div class="input-group w-90 mb-2">
        <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control" name="cat_title" placeholder="Insert Catagories" aria-label="Username" aria-describedby="basic-addon1">
      </div>
      <div class="input-group w-5 mb-2">
      <input type="submit" class="bg-primary p-2 my-2" name="insert_cat" value="Insert Catagories" aria-label="Username" aria-describedby="basic-addon1">

      </div>
</form>