<?php 
// include('includes/connect.php');


function get_products(){
    global $con;
    if(!isset($_GET['catagory'])){
    $select_query="Select * from `products` order by rand() limit 0,3";
    $result_query=mysqli_query($con,$select_query);
    while($row=mysqli_fetch_assoc($result_query)){
        $product_id=$row['product_id'];
        $product_title=$row['product_title'];
        $product_description=$row['product_description'];
         $product_keywords=$row['product_keywords'];
      $product_images1=$row['product_image1'];
    //   $product_images2=$row['product_image2'];
    //   $product_images3=$row['product_image3'];
       $product_price=$row['product_price'];
      $catagory_id=$row['catagory_id'];


      echo " <div class='col-md-4 mb-2'>
      <div class='card'>
          <img src='./admin/product_images/$product_images1' class='card-img-top' alt='...'>
          <div class='card-body'>
              <h5 class='card-title'>$product_title</h5>
              <p class='card-text'>$product_description</p>
              <p class='card-text'>Price:$product_price/-</p>

              <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
              <a href='$product_keywords' class='btn btn-secondary'>View More</a>
          </div>
      </div>
  </div>";


    }
}
}
//for  same all display products
function getall_products(){
  global $con;
  if(!isset($_GET['catagory'])){
  $select_query="Select * from `products` order by rand()";
  $result_query=mysqli_query($con,$select_query);
  while($row=mysqli_fetch_assoc($result_query)){
      $product_id=$row['product_id'];
      $product_title=$row['product_title'];
      $product_description=$row['product_description'];
     $product_keywords=$row['product_keywords'];
    $product_images1=$row['product_image1'];
  //   $product_images2=$row['product_image2'];
  //   $product_images3=$row['product_image3'];
     $product_price=$row['product_price'];
    $catagory_id=$row['catagory_id'];


    echo " <div class='col-md-4 mb-2'>
    <div class='card'>
        <img src='./admin/product_images/$product_images1' class='card-img-top' alt='...'>
        <div class='card-body'>
            <h5 class='card-title'>$product_title</h5>
            <p class='card-text'>$product_description</p>
            <p class='card-text'>Price:$product_price</p>

            <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
            <a href='$product_keywords' class='btn btn-secondary'>View More</a>
        </div>
    </div>
</div>";


  }
}
}

//for unique catagories


function get_uniquecatagories(){
    global $con;
    if(isset($_GET['catagory'])){
        $catagory_id=$_GET['catagory'];
    $select_query="Select * from `products` where catagory_id=$catagory_id";
    $result_query=mysqli_query($con,$select_query);
      $num_of_rows=mysqli_num_rows($result_query);
      if($num_of_rows==0){
        echo"<h2 class='text-center text-danger'>Stock Unabailavle</h2>";
      }
    while($row=mysqli_fetch_assoc($result_query)){
        $product_id=$row['product_id'];
        $product_title=$row['product_title'];
        $product_description=$row['product_description'];
        $product_viewmore=$row['product_keywords'];
        // $product_keywords=$row['product_keywords'];
      $product_images1=$row['product_image1'];
    //   $product_images2=$row['product_image2'];
    //   $product_images3=$row['product_image3'];
       $product_price=$row['product_price'];
      $catagory_id=$row['catagory_id'];


      echo " <div class='col-md-4 mb-2 '>
      <div class='card'>
          <img src='./admin/product_images/$product_images1' class='card-img-top' alt='...'>
          <div class='card-body'>
              <h5 class='card-title'>$product_title</h5>
              <p class='card-text'>$product_description</p>
              <p class='card-text'>Price:$product_price</p>

              <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
              <a href='index.php?add_to_cart=$product_id' class='btn btn-secondary'>View More</a>
          </div>
      </div>
  </div>";


    }
}
}


 function get_catagories(){
    global $con;
    $select_catagories="Select * from `catagories`";
    $result_catagories=mysqli_query($con,$select_catagories);
    while($row_data=mysqli_fetch_assoc($result_catagories)){
        $catagory_title=$row_data['catagory_title'];
        $catagory_id=$row_data['catagory_id'];
        echo "<li class='nav-item '>
        <a href='index.php?catagory=$catagory_id' class='nav-link text-center text-light'>$catagory_title </a>
          </li>";
    }
 }



 //for search

 function search_product(){
    global $con;
    if(isset($_GET['search_data_product'])){
        $search_data_value=$_GET['search_data'];
    // if(!isset($_GET['catagory'])){
    $search_query="Select * from `products` where product_keywords like '%$search_data_value%'";
    $result_query=mysqli_query($con,$search_query);
    while($row=mysqli_fetch_assoc($result_query)){
        $product_id=$row['product_id'];
        $product_title=$row['product_title'];
        $product_description=$row['product_description'];
         $product_keywords=$row['product_keywords'];
      $product_images1=$row['product_image1'];
    //   $product_images2=$row['product_image2'];
    //   $product_images3=$row['product_image3'];
       $product_price=$row['product_price'];
      $catagory_id=$row['catagory_id'];


      echo " <div class='col-md-4 mb-2'>
      <div class='card'>
          <img src='./admin/product_images/$product_images1' class='card-img-top' alt='...'>
          <div class='card-body'>
              <h5 class='card-title'>$product_title</h5>
              <p class='card-text'>$product_description</p>
              <p class='card-text'>Price:$product_price</p>

              <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
              <a href='$product_keywords' class='btn btn-secondary'>View More</a>
          </div>
      </div>
  </div>";


    }
}
 }
// }

// get ip adresss
function getIPAddress() {  
  //whether ip is from the share internet  
   if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
              $ip = $_SERVER['HTTP_CLIENT_IP'];  
      }  
  //whether ip is from the proxy  
  elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
              $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
   }  
//whether ip is from the remote address  
  else{  
           $ip = $_SERVER['REMOTE_ADDR'];  
   }  
   return $ip;  
}  
// $ip = getIPAddress();  
// echo 'User Real IP Address - '.$ip;  



//cart function
function cart(){
  if(isset($_GET['add_to_cart'])){
    global $con;
    $get_ip_address = getIPAddress();
    $get_product_id=$_GET['add_to_cart'];
    $select_query="Select * from `cart_details` where ip_address='$get_ip_address' and product_id=$get_product_id";
    $result_query=mysqli_query($con,$select_query);
    $num_of_rows=mysqli_num_rows($result_query);
    if($num_of_rows>0){
      echo"<script>alert('This item is already present in cart')</script>";
      echo"<script>window.open('index.php','_self')</script>";


    }
    else{
      $insert_query="insert into `cart_details` (product_id,ip_address,quantity) values('$get_product_id','$get_ip_address',0)";
      $result_query=mysqli_query($con,$insert_query);
      echo"<script>alert('Item is added to cart')</script>";
      echo"<script>window.open('index.php','_self')</script>";

    }


  }

}


//count cart number
function cart_item(){
  if(isset($_GET['add_to_cart'])){
    global $con;
    $get_ip_address = getIPAddress();
    // $get_product_id=$_GET['add_to_cart'];
    $select_query="Select * from `cart_details` where ip_address='$get_ip_address'";
    $result_query=mysqli_query($con,$select_query);
    $count_cart_items=mysqli_num_rows($result_query);
  }
    else{
      global $con;
    $get_ip_address = getIPAddress();
    // $get_product_id=$_GET['add_to_cart'];
    $select_query="Select * from `cart_details` where ip_address='$get_ip_address'";
    $result_query=mysqli_query($con,$select_query);
    $count_cart_items=mysqli_num_rows($result_query);
   

    }
    echo $count_cart_items;


  }

//calculating total cart price
function total_cart_price(){
  global $con;

  $get_ip_address = getIPAddress();
  $total=0;
  $cart_query="Select * from `cart_details` where ip_address='$get_ip_address'";
  $result_query=mysqli_query($con,$cart_query);
  while($row=mysqli_fetch_array($result_query)){
    $product_id=$row['product_id'];
    $select_products="Select * from `products` where product_id='$product_id'";
    $result_products=mysqli_query($con,$select_products);
    while($row_product_price=mysqli_fetch_array($result_products)){
      $product_price=array($row_product_price['product_price']);
      $product_values=array_sum($product_price);
      $total_price+= $product_values;

    }

  }
  echo $total_price;
}

?>
