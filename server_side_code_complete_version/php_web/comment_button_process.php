<?php
 session_start();
 $product_name = $_GET['name'];
 $comment_content = $_POST['user_comment'];
 $user_id = $_SESSION['id'];
 $product_id;

 $connection = mysqli_connect("localhost", "xin205", "80861649aB", "xin205");
 if($connection){
  $query = "select id from products where name = '{$product_name}'";
  $result = mysqli_query($connection, $query);
  $row = mysqli_fetch_assoc($result);
  $product_id = $row['id'];

  $query = "
           insert into comments (user_id, product_id, content)
           values ($user_id, $product_id, '{$comment_content}');
  ";
  $result = mysqli_query($connection, $query);
  header("Location: product.php?name={$product_name}");
 }

?>