<?php
  session_start();
  $user_id = $_SESSION['id'];
  $payment_method = $_POST['payment_method'];
  $card_number = $_POST['card_number'];

  $connection = mysqli_connect("localhost", "xin205", "80861649aB", "xin205");
  if($connection){
    $query = "
             insert into orders (user_id, payment_method, card_number)
             values ($user_id, '{$payment_method}', '{$card_number}');
           ";
    $result = mysqli_query($connection, $query);
    
    $query = "
             select id from orders where user_id = {$user_id}
              order by created_at desc limit 1;
           ";
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($result);
    $order_id = $row['id'];
    
    $query = "
              select * from cart_items where user_id = {$user_id};
             ";
    $result = mysqli_query($connection, $query);
    while($row = mysqli_fetch_assoc($result)){
      $query = "
                insert into purchased_items (product_id, order_id)
                values ({$row['product_id']}, $order_id);
              ";
      mysqli_query($connection, $query);
    }
    
    $query = "delete from cart_items where user_id = {$user_id}";
    $result = mysqli_query($connection, $query);
    header("Location: customer.php");
  }
  
?>


