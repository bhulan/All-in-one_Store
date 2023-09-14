<?php
$host= "localhost";
$username="root";
$password= "";
$database="mystore";


//database connection
$con= mysqli_connect($host,$username,$password,$database);
//cheek connection
if(!$con){
    die("database connection failed!".mysqli_connect_errors());
}

?>