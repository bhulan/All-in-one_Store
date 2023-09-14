<?php
if(isset($_GET['edit_catagory'])){
    $edit_catagory=$_GET['edit_catagory'];
    $get_catagory="Select * from `catagories` where catagory_id=$edit_catagory ";
    $result=mysqli_query($con,$get_catagory);
    $row=mysqli_fetch_assoc($result);
    $catagory_title=$row['catagory_title']; 
}

if(isset($_POST['edit_cat'])){
    $cat_title=$_POST['catagory_title'];

    $update_query="update `catagories` set catagory_title='$cat_title' where catagory_id=$edit_catagory";
    $result_cat=mysqli_query($con,$update_query);
    if($result_cat){
        echo "<script>alert('Catagory updated successfully')</script>";
        echo "<script>window.open('index.php','_self')</script>";

    }

}

?>


<div class="div container mt-3">
    <h1 class="text-center text-warning">
        Edit Category
    </h1>
    <form action="" method="post" class="text-center">
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="catagory_title" class="form-lable">Catagory title</label><br>
            <input type="text" name="catagory_title" id="catagory_title" class="from-control" value="<?php echo "$catagory_title" ?>" required>
        </div>
        <input type="submit" value="Update Catagory" class="btn btn-info px-3 mb-3" name="edit_cat">
    </form>

</div>




