<?php
 session_start();

 if(isset($_SESSION['username'])){
  $username = $_SESSION['username'];
 $product_name = $_GET['name'];

 $connection = mysqli_connect("localhost", "xin205", "80861649aB", "xin205");
 if($connection){
   // make database query
   $user_id;
   $product_id;

   $query = "select id from users where username = '$username'";
   $result = mysqli_query($connection, $query);
   $row = mysqli_fetch_assoc($result);
   $user_id = $row["id"];

   $query = "select id from products where name = '$product_name'";
   $result = mysqli_query($connection, $query);
   $row = mysqli_fetch_assoc($result);
   $product_id = $row["id"];

   $query = "insert into cart_items (user_id, product_id) values ($user_id, $product_id)";
   $result = mysqli_query($connection, $query);
   header("Location: product.php?name={$product_name}");
 }
 }else{
  header("Location: login.html");
 }
?>

